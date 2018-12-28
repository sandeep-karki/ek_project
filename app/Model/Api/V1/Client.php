<?php

namespace App\Model\Api\V1;

use Illuminate\Database\Eloquent\Model;

class Client extends \Laravel\Passport\Client
{
    public function checkClientSecret($secret)
    {
        return Client::where('secret',$secret)->first();

    }
}
