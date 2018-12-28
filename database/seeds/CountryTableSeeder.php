<?php

use Illuminate\Database\Seeder;
use App\Helper\Ekcms\EkHelper;
use App\Country;

class CountryTableSeeder extends Seeder
{
    private $country;

    /**
     * CountryTableSeeder constructor.
     */
    public function __construct()
    {
        $this->country = new Country();
        $this->ekHelper = new EkHelper();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        DB::table('countries')->truncate();
        $countriesFromDB = $this->country->limit(1)->get()->count();
        if($countriesFromDB == 0){

            $countries = $this->ekHelper->getCountries();
            foreach($countries as $country){
                DB::table('countries')->insert(
                    [
						'name' => $country['name'],
						'alpha_code' => $country['alpha_code'],
						'alpha_code_3' => $country['alpha_code_3'],
						'native_name' => $country['native_name'],
						'alternate_spellings' => $country['alternate_spellings'],

					]

				);
			}
		}

	}
}
