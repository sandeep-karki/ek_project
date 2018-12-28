<?php

namespace App\Http\Controllers\Api\V1;

use App\Model\Api\V1\GameConfig;
use App\Model\Api\V1\GameResult;
use App\Model\Api\V1\Prizes;
use App\Services\Api\ConstantService;
use App\Services\CommonService;
use App\Services\ConstantApiMessageService;
use App\Services\ConstantStatusService;
use App\Transformers\GameRequestTransformer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use EkParser;
use DB;


class GameRequestController extends Controller
{
    public function __construct()
    {
        $this->gameConfig = new GameConfig();
        $this->gameResult = new GameResult();
        $this->prizes = new Prizes();
        $this->commonService = new CommonService();
    }

    /**
     * @SWG\Post(
     *     path="/game/requests",
     *     tags={"Game"},
     *     operationId="game-requests",
     *     summary="Game Request",
     *     description="",
     *     consumes={"application/json"},
     *     produces={ "application/json"},
     *     @SWG\Parameter(
     *         name="body",
     *         in="body",
     *         description="Json Body params",
     *         required=false,
     *         @SWG\Schema(ref="#/definitions/game-request"),
     *     ),
     *     @SWG\Response(
     *         response=422,
     *         description="Required json Parameter",
     *     )
     * )
     * @SWG\Definition(
     *     definition="game-request",
     *          required={"meta","data"},
     *      @SWG\Property(
     *                 property="meta",
     *                type="object",
     * required={"copyright","email","api"},
     *     @SWG\Property(
     *                 property="copyright",
     *                 type="string",
     *             ),
     *      @SWG\Property(
     *                 property="email",
     *                 type="string",
     *             ),
     *      @SWG\Property(
     *                 property="api",
     *                 type="object",
     *     required={"version"},
     *     @SWG\Property(
     *                 property="version",
     *                 type="0.2",
     *             ),
     *             ),
     *             ),
     *
     *      @SWG\Property(
     *                 property="data",
     *                 type="object",
     * required={"latitude","longitude"},
     *     @SWG\Property(
     *                 property="latitude",
     *                 type="string",
     *             ),
     *     @SWG\Property(
     *                 property="longitude",
     *                 type="string",
     *             ),
     *             ),
     * )
     */

    public function gameRequest(Request $request)
    {
        $user = $request->user;
        $dataAttribute = $this->getParsedBody($request);

        $result = $this->gameResult->where('user_id',$user->id)->orderBy('date', 'DESC')->limit(1)->first();
        if ($result) {
            $todayCarbonDateTime = Carbon::now('Asia/Kathmandu');
            $lastGameDate = Carbon::parse($result->date);
            $diff = $todayCarbonDateTime->diffInSeconds($lastGameDate);

            if ($diff < ConstantService::THRESHOLDTIME) {
                $remainingSec = ConstantService::THRESHOLDTIME-$diff;
                if($remainingSec>60)$remainingTitle = ceil($remainingSec/60). ' minutes';
                else $remainingTitle = ($remainingSec). ' seconds';
                $error['error'] = 'game-blocked';
                $error['message'] = ConstantApiMessageService::GAMEBLOCKEDRESPONSE;
                $error['message'] = str_replace('{{time}}',$remainingTitle,$error['message']);
                return $this->commonService->errorCustomError($error, $titleMessage = null, ConstantStatusService::FORBIDDENSTATUS);
            }

        }


        if ($this->getGameTotalPercentage() == 0) {
            $error['error'] = 'game-blocked';
            $error['message'] = ConstantApiMessageService::GAMEEXPIREDRESPONSE;
            return $this->commonService->errorCustomError($error, $titleMessage = null, ConstantStatusService::BADREQUEST);
        }

        $totalPercentage = $this->getGameTotalPercentage();
        $this->reArrangePosition();

        $randomPercentage = mt_rand(1, $totalPercentage);
        $prizeId = $this->getPrizeId($randomPercentage);

        if (empty($prizeId) || is_null($prizeId) || !isset($prizeId)) {
            $prizeId = '10';
        }

        $this->prizes->where('id', $prizeId)->where('type', 'ticket')->update(array('enable' => 'no'));

        try {
            $gameResult = new GameResult();
            $gameResult->user_id = $user->id;
            $gameResult->prize_id = $prizeId;
            $gameResult->date = Carbon::now();
            $gameResult->code = $this->randomString();
            $gameResult->status = 'unclaimed';
            $gameResult->ip_address = $request->ip();
            $gameResult->latitude = empty($dataAttribute->latitude) == true ? null :$dataAttribute->latitude;
            $gameResult->longitude =  empty($dataAttribute->longitude) == true ? null :$dataAttribute->longitude;


            $gameResult->save();

            return $this->commonService->respondWithItem($gameResult,new GameRequestTransformer(),'game-results');

//            DB::commit();
        } catch (\Exception $e) {
//            dd($e->getMessage());
//            DB::rollback();
            $error['error'] = $e->getCode();
            $error['message'] = $e->getMessage();
            return $this->commonService->errorCustomError($error, $titleMessage = null, ConstantStatusService::BADREQUEST);

        }






    }

    public function getPrizeId($randomPercentage)
    {
        $prizes = $this->prizes->where('enable', 'yes')->orderBy('position')->get();
        $count = 0;
        foreach ($prizes as $prize) {
            $upperLimit = $count + $prize->percentage;
            $lowerLimit = $count;
            $count = $upperLimit;

            if ($randomPercentage > $lowerLimit && $randomPercentage <= $upperLimit) {
                return $prize->id;
            }
        }

    }

    public function getParsedBody(Request $request)
    {
        $data = EkParser::get("data");
        $data = EkParser::replaceDashes((object)$data);
        $response = new Request($data);

        return $response;

    }


    public function randomString($length = 6)
    {
        $str = "";
        $strNumber = "";
        $characters = array_merge(range('A', 'Z'));
        $numbers = array_merge(range('0', '9'));
        $maxNumbers = count($numbers) - 1;
        $max = count($characters) - 1;

        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $randNumbers = mt_rand(0, $maxNumbers);
            $strNumber .= $numbers[$randNumbers];
            $str .= $characters[$rand];
        }

        return $str . $strNumber;
    }

    public function getBronzeResults($user)
    {
        $todayDate = Carbon::now('Asia/Kathmandu')->toDateString();
        $gameResult = $this->gameResult->where('prize_id', 1)
            ->where('user_id', $user->id)->whereDate('date', $todayDate)->first();

        if ($gameResult) {
            return true;
        } else {
            return false;
        }
    }

    public function reArrangePosition()
    {
        $prizeAttributes = $this->prizes->get();
        $position = 100;
        foreach ($prizeAttributes as $prizeAttribute) {
            $data['position'] = $position;
            $this->prizes->where('id', $prizeAttribute->id)->update($data);
            $position++;
        }


        $prizes = $this->prizes->where('enable', 'yes')->get();
        $position = 1;
        foreach ($prizes as $prize) {
            $data['position'] = $position;
            $this->prizes->where('id', $prize->id)->update($data);
            $position++;
        }

        $prizes = $this->prizes->where('enable', 'no')->get();
        foreach ($prizes as $prize) {
            $data['position'] = $position;
            $this->prizes->where('id', $prize->id)->update($data);
            $position++;

        }


    }


    public function getGamePercentage($value)
    {
        $game = $this->prizes->where('id', $value)->first();
        $gamePercentage = $game->percentage;
        return $gamePercentage;

    }

    public function getGameTotalPercentage()
    {
        return $this->prizes->where('enable', 'yes')->sum('percentage');

    }


}
