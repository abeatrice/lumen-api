<?php

use Illuminate\Database\Seeder;
use App\Airport;

class AirportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Airport::create([
            'name' => 'Los Angeles International Airport',
            'code' => 'LAX'
        ]);

        Airport::create([
            'name' => 'Seattle-Tacoma International Airport',
            'code' => 'SEA'
        ]);

        Airport::create([
            'name' => 'Portland International Airport',
            'code' => 'PDX'
        ]);

        Airport::create([
            'name' => "O'Hare International Airport",
            'code' => 'ORD'
        ]);
    }
}
