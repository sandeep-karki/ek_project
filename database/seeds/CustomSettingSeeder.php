<?php

use Illuminate\Database\Seeder;
use App\CustomSetting;

class CustomSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[];
        if(DB::table('custom_settings')->where('label','Cms Title')->first()==null) {
            $data[] =
                [
                    'label' => 'Cms Title',
                    'value' => 'Ekcms',
                    'type' => 'text'
                ];
        }
        if(DB::table('custom_settings')->where('label','Cms Theme Color')->first()==null) {
            $data[] = [
                'label' => 'Cms Theme Color',
                'value' => '#292961',
                'type' => 'color'
            ];
        }
        if(DB::table('custom_settings')->where('label','Cms Logo')->first()==null) {
            $data[] = [
                'label' => 'Cms Logo',
                'value' => NULL,
                'type' => 'file'
            ];
        }
        if(!empty($data)){
            foreach($data as $d){
                CustomSetting::create($d);
            }
        }
    }
}
