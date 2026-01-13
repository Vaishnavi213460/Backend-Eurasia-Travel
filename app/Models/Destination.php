<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model {
    public function country() {
        return $this->belongsTo(Country::class);
    }
    public function tours() {
        return $this->hasMany(Tour::class);
    }
    public function hotels() {
        return $this->hasMany(Hotel::class);
    }
    public function attractions() {
        return $this->hasMany(Attraction::class);
    }
}

