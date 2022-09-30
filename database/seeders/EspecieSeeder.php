<?php

namespace Database\Seeders;

use App\Models\Especie;
use Illuminate\Database\Seeder;

class EspecieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Especie::insert([
            [
                'nombre' => 'Ave'
            ],
            [
                'nombre' => 'Reptil'
            ],
            [
                'nombre' => 'Mamifero'
            ],
            [
                'nombre' => 'Anfibio'
            ]
        ]);
    }
}
