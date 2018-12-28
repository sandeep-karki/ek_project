<?php

namespace App\Model\Api\V1;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ApiUser extends Authenticatable
{
    use HasApiTokens, Notifiable;
    protected $table = "api_users";

    protected $fillable = ['name', 'email','password','gender','verified','profile_picture','social_id','phone_number','type'];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
