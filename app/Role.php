<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Role extends Model implements AuditableContract
{
    /**
     * Traits
     */
    use Auditable;


    /**
     * @var array
     */
    protected $fillable = ['name', 'permissions','name','role_id'];

    /**
     * @var string
     */
    protected $table = 'roles';

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    /**
     * @param array $data
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllData($data = array())
    {
        $role = Role::query();
        if (isset($data['keywords'])) {
            $role->where('name', 'LIKE', '%' . $data['keywords'] . '%');
        }
        return $role->paginate(20);
    }

    /**
     * @param $id
     * @return array
     */
    public function getUserRoles($id)
    {
        $permisssionArray = array();
        $role = Role::where('id', $id)->first();
        $permission = $role->permissions;
        if ($permission != null) {
            foreach (json_decode($permission) as $key => $value) {
                $key = explode('.', $key, 2);
                @$permisssionArray[$key[0]][$key[1]] = $value;
            }
        }
        return $permisssionArray;
    }
}
