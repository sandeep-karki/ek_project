<?php

namespace App\Http\Controllers\Api\V1;

use App\Services\ConstantStatusService;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use File;
use App\Http\Controllers\Controller;

class HomeContoller extends Controller
{
    public function getHomeData()
    {
        $txtFile =public_path().'/home.json';
        $contents = json_decode(file_get_contents($txtFile), true);
        return response($contents,ConstantStatusService::OKSTATUS)
            ->header('Content-Type', 'application/json');
    }



}
