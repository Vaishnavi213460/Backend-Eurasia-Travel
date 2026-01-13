<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destination;
use App\Models\Hotel;

class HotelSeeder extends Seeder
{
    public function run(): void
    {
        Destination::all()->each(function ($destination) {

            Hotel::create([
                'destination_id' => $destination->id,
                'name' => $destination->name . ' Mandarin Oriental',
                'category' => '5-star',
                'price' => rand(180, 350),
                'amenities' => [
                    'Free WiFi',
                    'Swimming Pool',
                    'Spa',
                    'Breakfast Included'
                ],
            ]);

            Hotel::create([
                'destination_id' => $destination->id,
                'name' => $destination->name . ' City Hotel',
                'category' => '3-star',
                'price' => rand(70, 150),
                'amenities' => [
                    'Free WiFi',
                    'Air Conditioning',
                    'Breakfast'
                ],
            ]);

            Hotel::create([
                'destination_id' => $destination->id,
                'name' => $destination->name . ' Grand Hyatt',
                'category' => '5-star',
                'price' => rand(70, 150),
                'amenities' => [
                    'Free WiFi',
                    'Air Conditioning',
                    'Breakfast',
                    'Fitness center',
                    'Outdoor Pool'
                ],
            ]);
        });
    }
}
