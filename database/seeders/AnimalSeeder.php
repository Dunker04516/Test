<?php

namespace Database\Seeders;

use App\Models\Animales;
use Illuminate\Database\Seeder;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Animales::insert([
            [
                'nombre' => 'Guacamaya',
                'especie' => 1,
                'habitat' => 1
            ],
            [
                'nombre' => 'Oso Polar',
                'especie' => 3,
                'habitat' => 5
            ],
            [
                'nombre' => 'Ciervo',
                'especie' => 3,
                'habitat' => 2
            ]
        ]);
    }
}
