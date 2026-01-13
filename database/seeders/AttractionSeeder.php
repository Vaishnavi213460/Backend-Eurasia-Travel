<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destination;
use App\Models\Attraction;

class AttractionSeeder extends Seeder
{
    public function run(): void
    {
        Destination::all()->each(function ($destination) {

            Attraction::create([
                'destination_id' => $destination->id,
                'name' => 'Famous ' . $destination->name . ' Landmark',
            ]);

            Attraction::create([
                'destination_id' => $destination->id,
                'name' => $destination->name . ' Local Market',
            ]);

            Attraction::create([
                'destination_id' => $destination->id,
                'name' => $destination->name . ' Temple',
            ]);
        });
    }
}
