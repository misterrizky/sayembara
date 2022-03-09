<?php

namespace Database\Seeders;

use App\Models\User;
use App\Helpers\Helper;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = array(
            [
                'name' => 'Administrator',
                'username' => 'admin',
                'phone' => '0',
                'email' => 'admin@pu.go.id',
                'email_verified_at' => date("Y-m-d H:i:s"),
                'password' => Hash::make('password'),
                'country_id' => 1,
                'province_id' => 32,
                'city_id' => 73,
                'address' => 'Jakarta',
                'role' => 1,
                'st' => 'a',

            ]
        );
        foreach($user AS $u){
            User::create([
                'register_code' => Helper::IDGenerator(new User, 'register_code','ADMIN-'),
                'ktp_no' => 1234567891011121,
                'npwp_no' => '00.000.000.0-000.000',
                'ska_no' => 0,
                'name' => $u['name'],
                'username' => $u['username'],
                'email' => $u['email'],
                'phone' => $u['phone'],
                'email_verified_at' => $u['email_verified_at'],
                'role' => $u['role'],
                'password' => $u['password'],

            ]);
        }
    }
}
