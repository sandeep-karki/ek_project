<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\V2\ApiController;
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
use App\Transformers\GameResultTransformer;
use League\Fractal\Manager;

class GameResultController extends ApiController
{
    /**
     * @var Manager
     */
    private $manager;

    /**
     * GameResultController constructor.
     * @param Manager $manager
     */
    public function __construct(Manager $manager)
    {
        parent::__construct($manager);
        $this->gameConfig = new GameConfig();
        $this->gameResult = new GameResult();
        $this->prizes = new Prizes();
        $this->commonService = new CommonService();
        $this->manager = $manager;
    }



    public function gameResult(Request $request)
    {
        $user = $request->user;
        $tryAgain = $this->prizes->where('title','Try Again')->first();

        if ($tryAgain) {
            $result = $this->gameResult->where('user_id',$user->id)->where('prize_id','<>',$tryAgain->id)->orderBy('date', 'DESC')->paginate(50);
            return $this->respondWithCollection($result,new GameResultTransformer(),'game-result');
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
