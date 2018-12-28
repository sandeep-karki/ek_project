<?php

namespace App\Model\Api\V1;



class GameConfig extends \App\GameConfig
{
    public function checkGameConfig($code)
    {
        $gameConfig = GameConfig::where('title',$code)->where('value','yes')->first();

        if ($gameConfig) {
            return true;
        } else {
            return false;
        }
    }


}