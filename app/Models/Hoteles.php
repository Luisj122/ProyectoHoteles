<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hoteles extends Model
{
    use HasFactory;

    public function habitacion():HasMany
    {
        return $this->hasMany(Habitaciones::class, 'hotel_id');
    }

    

}
