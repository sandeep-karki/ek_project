<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $table = 'countries';

    protected $fillable = [
        'name',
        'alpha_code',
        'alpha_code_3',
        'native_name',
        'alternate_spellings',
    ];

    public function getCountriesArr(){
        return Country::pluck('name')->toArray();
    }

    public function getAllCountries(){

        return Country::all();
    }

    public function getCountry($country){

        $countryFromDB = Country::where('name',$country)
            ->orWhere('alpha_code',$country)
            ->orWhere('alpha_code_3',$country)
            ->orWhere('native_name',$country)
            ->orWhere('alternate_spellings','LIKE',"%,\"$country\"%")
            ->orWhere('alternate_spellings','LIKE',"%\"$country\"%")
            ->first();

        return $countryFromDB;
    }

    public function getCountries($countries){

        foreach ($countries as $country){
             $countryFromDB = Country::where('name',$country)
                ->orWhere('alpha_code',$country)
                ->orWhere('alpha_code_3',$country)
                ->orWhere('native_name',$country)
                 ->orWhere('alternate_spellings','LIKE',"%,\"$country\"%")
                 ->orWhere('alternate_spellings','LIKE',"%\"$country\"%")
                 ->first();
             if($countryFromDB == null){
                 continue;
             }
             $countriesFromDB[] = $countryFromDB->name;
             return $countriesFromDB;
        }
    }
}
