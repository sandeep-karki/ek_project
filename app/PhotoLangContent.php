<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoLangContent extends Model
{
	protected $table='photo_lang_contents';

	protected $fillable = ['photo_id','lang_id','caption'];

	protected $guarded = ['id', '_token'];

	
	public function photo(){
		return $this->belongsTo('App\Photos','photo_id','id');
	}
	
}
