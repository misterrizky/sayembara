<?php

namespace Database\Seeders;

use App\Models\Day;
use Illuminate\Database\Seeder;

class DaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $day = array(
            [
                'd' => '0'
            ],
            [
                'd' => '1'
            ],
            [
                'd' => '2'
            ],
            [
                'd' => '3'
            ],
            [
                'd' => '4'
            ],
            [
                'd' => '5'
            ],
            [
                'd' => '6'
            ],
            [
                'd' => '7'
            ],
            [
                'd' => '8'
            ],
            [
                'd' => '9'
            ],
            [
                'd' => '10'
            ],
            [
                'd' => '11'
            ],
            [
                'd' => '12'
            ],
            [
                'd' => '13'
            ],
            [
                'd' => '14'
            ],
            [
                'd' => '15'
            ],
            [
                'd' => '16'
            ],
            [
                'd' => '17'
            ],
            [
                'd' => '18'
            ],
            [
                'd' => '19'
            ],
            [
                'd' => '20'
            ],
            [
                'd' => '21'
            ],
            [
                'd' => '22'
            ],
            [
                'd' => '23'
            ],
            [
                'd' => '24'
            ],
            [
                'd' => '25'
            ],
            [
                'd' => '26'
            ],
            [
                'd' => '27'
            ],
            [
                'd' => '28'
            ],
            [
                'd' => '29'
            ],
            [
                'd' => '30'
            ],
            [
                'd' => '31'
            ],
        );
        foreach($day AS $d){
            Day::create([
                'd' => $d['d']
            ]);
        }
    }
}
