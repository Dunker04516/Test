<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animales extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'especie', 'habitat'];

    function especies()
    {
        return $this->hasMany(Especie::class, 'id');
    }

    function habitats()
    {
        return $this->hasMany(Habitat::class, 'id');
    }
}
