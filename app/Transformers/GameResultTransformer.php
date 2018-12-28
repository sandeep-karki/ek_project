<?php
/**
 * Created by PhpStorm.
 * User: ek-php-mac
 * Date: 2/23/18
 * Time: 1:20 PM
 */
/**
 * Created by PhpStorm.
 * User: samina-mac-mini
 * Date: 2/22/18
 * Time: 2:11 PM
 */

namespace App\Transformers;


use App\Model\Api\V1\GameResult;
use Carbon\Carbon;
use League\Fractal\TransformerAbstract;

class GameResultTransformer extends TransformerAbstract
{
    protected $defaultIncludes = [
        'prizes'
    ];

    public function transform(GameResult $gameResult)
    {
       $date = $gameResult->date ? Carbon::parse($gameResult->date):null;
        return [
            'id' => $gameResult->id,
            'code' => $gameResult->code,
            'status' => $gameResult->status,
            'date' => $date !=null ? $date->toDateTimeString(): null
        ];
    }

    public function includePrizes(GameResult $gameResult)
    {
        $prizes = $gameResult->prizes;
        $prizesTransformer = new PrizesTransformer($gameResult->code);
        return $this->item($prizes, $prizesTransformer, 'prizes');
    }
}