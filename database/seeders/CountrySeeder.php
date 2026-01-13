<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        $countries = [
            'Thailand',
            'Malaysia',
            'Singapore',
            'Vietnam',
            'Indonesia',
        ];

        foreach ($countries as $country) {
            Country::firstOrCreate(['name' => $country]);
        }
    }
}
