<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginLog extends Model
{

    protected $guarded = ['id', '_token'];

    protected $fillable = ['user_id', 'ip', 'city', 'country', 'isp', 'lat', 'lon', 'timezone','region_name'];



    public function getAlldata($data=array()){
        $assigned = LoginLog::query();

        if(isset($data['user_id']))
        {
            $assigned->where('user_id',$data['user_id']);

        }
        //return  $query->paginate(50);
        return $assigned->orderBy('id','desc')->paginate(20);
    }


    public function users(){
        return $this->belongsTo('App\User','user_id','id');
    }

    public function getUserById($userId)
    {
        $userName = "N/A";
        $userData = User::where('id', $userId)->first();
        if (!empty($userData)) {
            $userName = $userData->first_name.' '.$userData->last_name;
        }
        return $userName;
    }
}
