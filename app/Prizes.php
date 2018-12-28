<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prizes extends Model
{
    protected $table = "prizes";

    protected $fillable = ['id','title','display_name','message','percentage','enable','position','type'];

    public function getAllData($data=array()){
        $prizes = Prizes::query();
        if(isset($data['keywords'])){
            $prizes->whereRaw(" LOWER(CONCAT_WS('', title,display_name,message,percentage,enable,position,type)) LIKE LOWER('%".(trim($data['keywords'])) ."%')");
        }
        return $prizes->orderBy('position')->paginate(20);
    }


}
