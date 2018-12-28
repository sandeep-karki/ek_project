<?php
/**
 * Created by PhpStorm.
 * User: samina-mac-mini
 * Date: 2/22/18
 * Time: 2:11 PM
 */

namespace App\Transformers;


use App\Model\Api\V1\GameResult;
use League\Fractal\TransformerAbstract;

class GameRequestTransformer extends TransformerAbstract
{
        protected $defaultIncludes = [
        'prizes'
    ];

    public function transform(GameResult $gameResult)
    {
        return [
            'id' => $gameResult->id,
            'code' => $gameResult->code,
        ];
    }

    public function includePrizes(GameResult $gameResult)
    {
        $prizes = $gameResult->prizes;
        $prizesTransformer = new PrizesTransformer($gameResult->code);
        return $this->item($prizes, $prizesTransformer, 'prizes');
    }
}