<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TravelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('travel')->insert([

            [
                'name' => 'Green Iceland',
                'description' => 'Enojoy this magical land where beauty and sustainability go hand in hand.',
                'location' => 'Reykjavík',
                'attendees' => 24,
                'reference' => 'ICE_123'
            ],
            [
                'name' => 'Italy Eco Stay',
                'description' => 'Visit the greenest italian region and enjoy the Sustainability Festival in Trento.',
                'location' => 'Trentino',
                'attendees' => 9,
                'reference' => 'EU_005'
            ],
            [
                'name' => 'Ecotourism in France',
                'description' => 'Get amazed by 1.700km of costline, 3 natural parks and extraordinary heritage.',
                'location' => 'Brittany',
                'attendees' => 21,
                'reference' => 'EU_FR5'
            ],

            [
                'name' => 'Canada Carbon Neutral',
                'description' => 'Bike the most scenic sections of the Confederation Trail in Price Edward Island.',
                'location' => 'Charlottetown',
                'attendees' => 3,
                'reference' => 'CA_022'
            ]
        ]);
    }
}
