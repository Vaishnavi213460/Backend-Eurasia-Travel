<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\Destination;

class DestinationSeeder extends Seeder
{
    public function run(): void
    {
        $destinations = [
            'Thailand' => ['Bangkok', 'Phuket', 'Chiang Mai', 'Pattaya'],
            'Malaysia' => ['Kuala Lumpur', 'Langkawi', 'Penang'],
            'Singapore' => ['Marina Bay', 'Sentosa', 'Orchard Road'],
            'Vietnam' => ['Hanoi', 'Ho Chi Minh City', 'Da Nang', 'Ha Long Bay'],
            'Indonesia' => ['Bali', 'Jakarta', 'Yogyakarta'],
        ];

        foreach ($destinations as $countryName => $cities) {
            $country = Country::where('name', $countryName)->first();

            foreach ($cities as $city) {
                Destination::firstOrCreate([
                    'country_id' => $country->id,
                    'name' => $city
                ]);
            }
        }
    }
}
