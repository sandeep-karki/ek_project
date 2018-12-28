<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class ApiUser extends Authenticatable
{
    protected $table = "api_users";

    protected $fillable = ['name', 'email', 'gender', 'verified','profile_picture','social_id','phone_number','type'];

    public function getAllData($data=array()){
        $apiusers = ApiUser::query();
        if(isset($data['keywords'])){
            $apiusers->whereRaw(" LOWER(CONCAT_WS('', name,email,gender,verified,social_id,phone_number,type)) LIKE LOWER('%".(trim($data['keywords'])) ."%')");
        }
        return $apiusers->orderBy('created_at','desc')->paginate(20);
    }

    public function getCountApiUsers(){
        return  $user_info = DB::table('api_users')
            ->select('type', DB::raw('count(*) as total'))
            ->groupBy('type')->pluck('total','type');

    }
    public function TotalApiUsers(){
        return  $user_info = DB::table('api_users')
            ->select(DB::raw('count(*) as total'))
            ->get()->first();

    }

}
