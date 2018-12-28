<?php

namespace App;

use App\Traits\FormatsDates;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = "settings";

    protected $fillable = ['about','terms_of_service','privacy_policy','notification_title','notification_message','api_key','order_from','order_to','merchant_code','merchant_secret','meta_title','meta_keywords','meta_descriptions','phone1','phone2','mobile_no','email','public_email','latitude','longitude','fb_link','twitter_link','youtube_link','skype_link','instagram_link','main_title','secondary_title','time_zone','language_selection','product_notification','category_notification'];

    protected $guarded = ['id', '_token'];

    public function getData()
    {
        return Setting::first();
    }
}
