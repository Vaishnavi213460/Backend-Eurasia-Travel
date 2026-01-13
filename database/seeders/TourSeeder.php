<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destination;
use App\Models\Tour;

class TourSeeder extends Seeder
{
    public function run(): void
    {
        $destinationTours = [
            'Bangkok' => [
                ['Grand Palace & Wat Pho Tour', 1, 4.6],
                ['Ayutthaya Historical Day Trip', 1, 4.7],
                ['Bangkok Night Street Food Tour', 1, 4.8],
            ],
            'Phuket' => [
                ['Phi Phi Islands Speedboat Tour', 1, 4.9],
                ['James Bond Island Tour', 1, 4.8],
                ['Phuket Sunset Cruise', 1, 4.7],
            ],
            'Chiang Mai' => [
                ['Elephant Sanctuary Experience', 1, 4.9],
                ['Doi Inthanon National Park Tour', 1, 4.7],
                ['Chiang Mai Old City Walking Tour', 1, 4.6],
            ],
            'Pattaya' => [
                ['Coral Island Tour', 1, 4.6],
                ['Nong Nooch Garden Visit', 1, 4.5],
                ['Pattaya Floating Market Tour', 1, 4.4],
            ],

            'Kuala Lumpur' => [
                ['KL City Highlights Tour', 1, 4.5],
                ['Batu Caves & Cultural Tour', 1, 4.6],
                ['Putrajaya Day Tour', 1, 4.4],
            ],
            'Langkawi' => [
                ['Langkawi Island Hopping Tour', 1, 4.7],
                ['Langkawi Cable Car Experience', 1, 4.6],
                ['Mangrove Forest Boat Tour', 1, 4.5],
            ],
            'Penang' => [
                ['George Town Heritage Walk', 1, 4.8],
                ['Penang Street Food Tour', 1, 4.7],
                ['Penang Hill & Kek Lok Si Tour', 1, 4.6],
            ],

            'Marina Bay' => [
                ['Marina Bay Sands SkyPark Visit', 1, 4.7],
                ['Singapore River Cruise', 1, 4.6],
                ['Gardens by the Bay Tour', 1, 4.8],
            ],
            'Sentosa' => [
                ['Universal Studios Singapore Tour', 1, 4.9],
                ['Sentosa Island Cable Car Ride', 1, 4.6],
                ['SEA Aquarium Experience', 1, 4.7],
            ],
            'Orchard Road' => [
                ['Orchard Road Shopping Tour', 1, 4.4],
                ['Singapore Night City Tour', 1, 4.6],
                ['Local Food & Culture Walk', 1, 4.5],
            ],

            'Hanoi' => [
                ['Hanoi Old Quarter Walking Tour', 1, 4.7],
                ['Hanoi Street Food Tour', 1, 4.8],
                ['Hoa Lu & Tam Coc Day Trip', 1, 4.6],
            ],
            'Ho Chi Minh City' => [
                ['Cu Chi Tunnels Experience', 1, 4.7],
                ['Mekong Delta Full-Day Tour', 1, 4.8],
                ['Saigon City Highlights Tour', 1, 4.6],
            ],
            'Da Nang' => [
                ['Ba Na Hills & Golden Bridge Tour', 1, 4.9],
                ['Marble Mountains Exploration', 1, 4.6],
                ['Hoi An Ancient Town Tour', 1, 4.8],
            ],
            'Ha Long Bay' => [
                ['Ha Long Bay Cruise Experience', 2, 4.9],
                ['Kayaking & Cave Exploration', 1, 4.7],
                ['Overnight Junk Boat Cruise', 2, 4.8],
            ],

            'Bali' => [
                ['Ubud Cultural & Rice Terrace Tour', 1, 4.9],
                ['Nusa Penida Island Adventure', 1, 4.8],
                ['Bali Sunset Temple Tour', 1, 4.7],
            ],
            'Jakarta' => [
                ['Jakarta City Heritage Tour', 1, 4.4],
                ['Old Town & Museum Walk', 1, 4.3],
                ['Thousand Islands Day Trip', 1, 4.5],
            ],
            'Yogyakarta' => [
                ['Borobudur Sunrise Tour', 1, 4.9],
                ['Prambanan Temple Visit', 1, 4.8],
                ['Mount Merapi Lava Tour', 1, 4.7],
            ],
        ];

        Destination::all()->each(function ($destination) use ($destinationTours) {

            if (!isset($destinationTours[$destination->name])) {
                return;
            }

            foreach ($destinationTours[$destination->name] as $tour) {
                Tour::create([
                    'destination_id' => $destination->id,
                    'name' => $tour[0],
                    'price' => rand(90, 450),
                    'duration' => $tour[1],
                    'rating' => $tour[2],
                ]);
            }
        });
    }
}
