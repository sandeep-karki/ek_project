<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * @var \App\User
     */
    private $user;

    /**
     * UserTableSeeder constructor.
     * @param \App\User $user
     */
    public function __construct(\App\User $user)
    {
        $this->user = $user;
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('users')->where('id',1)->where('username','admin')->first()==null){
            $insertedData['first_name'] = 'Ekbana';
            $insertedData['last_name'] = 'Ekbana';
            $insertedData['username'] = 'admin';
            $insertedData['email'] = 'info@ekbana.com';
            $insertedData['status'] = true;
            $insertedData['password'] = '123admin@';
            $insertedData['ip'] = '110.44.123.47';
            $insertedData['city'] = 'Kathmandu';
            $insertedData['country'] = 'Nepal';
            $insertedData['created_at'] = Carbon::now();
            $this->user->create($insertedData);
        }

    }
}
