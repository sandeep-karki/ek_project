<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'title','code','subject','from','template','type',
    ];


    /**
     * @param $request
     * @return mixed
     */
    public function getTemplates($request){
        $template = EmailTemplate::query();
        if(array_key_exists('keywords',$request)){

            $template->whereRaw(" LOWER(CONCAT_WS('', title,code,subject)) LIKE LOWER('%".(trim($request['keywords'])) ."%')");
        }
        return $template->where('type',$request['type'])
            ->paginate(20);
    }

    /**
     * @param $code
     * @return mixed
     */
    public function getTemplateBySlug($code)
    {
        return EmailTemplate::where('code',$code)->first();
    }

    /**
     * @param $code
     * @return mixed
     */
    public function getSMSTemplateBySlug($code)
    {
        return EmailTemplate::where('code',$code)->where('type','sms')->first();
    }
}
