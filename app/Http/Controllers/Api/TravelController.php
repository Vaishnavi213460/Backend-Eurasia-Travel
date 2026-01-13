<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Destination;
use App\Models\Tour;
use App\Models\Hotel;
use App\Models\Attraction;

class TravelController extends Controller
{
    public function countries() {
        return Country::all();
    }

    public function destinations(Request $request) {
        return Destination::where('country_id', $request->country_id)->get();
    }

    public function tours(Request $request) {
        return Tour::where('destination_id', $request->destination_id)->get();
    }

    public function hotels(Request $request) {
        if( $request->destination_id){
            return Hotel::where('destination_id', $request->destination_id)->get();
        }
        return Hotel::all();
    }

    public function attractions(Request $request) {
        if( $request->destination_id){
            return Attraction::where('destination_id', $request->destination_id)->get();
        }
        return Attraction::all();
    }
}
