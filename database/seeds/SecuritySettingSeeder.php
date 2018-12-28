<?php

use Illuminate\Database\Seeder;
use App\SecuritySetting;

class SecuritySettingSeeder extends Seeder
{
    /**
     * @var \App\SecuritySetting
     */
    private $user;

    /**
     * SecuritySettingSeeder constructor.
     * @param \App\SecuritySetting $ss
     */
    public function run()
    {
        SecuritySetting::query()->truncate();
        $data = [
            ['title'=>'No authentication','target'=>NULL],
            ['title'=>'Authenticate User When IP Change','target'=>'ip'],
            ['title'=>'Authenticate User When City Change','target'=>'city'],
            ['title'=>'Authenticate User When Country Change','target'=>'country'],
        ];
        foreach($data as $d){

        SecuritySetting::create($d);
        }

    }
}
