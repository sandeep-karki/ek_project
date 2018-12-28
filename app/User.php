<?php

namespace App;

use App\Traits\CheckPermission;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class User extends Authenticatable implements AuditableContract
{

    /**
     * Traits
     */
    use Notifiable, CheckPermission, Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $auditInclude = [
        'first_name',
        'last_name',
        'status',
        'username',
        'email','password','last_logged_in','last_logged_out','last_logged_out'
    ];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Attributes to include in the Audit.
     *
     * @var array
     */
    protected $auditExclude = [
        'remember_token',
    ];

    protected $table='users';

    protected $fillable = [
        'first_name','last_name', 'email', 'username','password','permissions','created_by','created_at','updated_at','role_id','updated_by','status','image','city','country','ip','verification_code','global_setting'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * @param array $data
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllData($data=array()){
        $users = User::query();
        if(isset($data['keywords'])){
            $users->whereRaw(" LOWER(CONCAT_WS('', first_name,last_name,username,email)) LIKE LOWER('%".(trim($data['keywords'])) ."%')");
        }
        return $users->orderBy('created_at','desc')->paginate(20);
    }

    /**
     * @param $status
     * @return mixed
     */
    public function countUser($status){
       $userCount = User::selectRaw("COUNT(id) as count");
       if($status !== null){
           $userCount->where('status',$status);
       }
            return $userCount->first()->count;
    }


    /**
     * @param $email
     * @return mixed
     */
    public function findbyEmail($email){
        return User::where('email',$email)->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function rolesUser()
    {
        return $this->hasOne('App\RoleUser','user_id','id');
    }

    /**
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
