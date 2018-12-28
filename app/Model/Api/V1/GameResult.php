<?php

namespace App\Model\Api\V1;



class GameResult extends \App\GameResult
{

    public function prizes()
    {
        return $this->hasOne('App\Model\Api\V1\Prizes','id','prize_id');
    }

}