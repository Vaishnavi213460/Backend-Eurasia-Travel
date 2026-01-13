<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function destinations() {
        return $this->hasMany(Destination::class);
    }
}
