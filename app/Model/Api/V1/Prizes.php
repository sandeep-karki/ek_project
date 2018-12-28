<?php

namespace App\Model\Api\V1;



class Prizes extends \App\Prizes
{
    public function checkGameConfig($id)
    {
        $gameConfig = Prizes::where('id',$id)->where('enable','yes')->first();

        if ($gameConfig) {
            return true;
        } else {
            return false;
        }
    }




}