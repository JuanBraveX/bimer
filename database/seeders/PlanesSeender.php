<?php

namespace Database\Seeders;

use App\Models\Plane;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanesSeender extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Plane::create([
            'nombre' => 'Begginer',
            'descripcion' => 'Plan gratuito ideal para principiantes.',
            'precio' => 9.99,
            'descuento' => 0,
        ]);

        Plane::create([
            'nombre' => 'Ideal',
            'descripcion' => 'Plan ideal para usuarios regulares que buscan funcionalidades',
            'precio' => 15,
            'descuento' => 0,
        ]);
        Plane::create([
            'nombre' => 'Mine',
            'descripcion' => ' Plan personalizado con funciones específicas según tus necesidades',
            'precio' => 20,
            'descuento' => 10,
        ]);
        Plane::create([
            'nombre' => 'One',
            'descripcion' => 'Plan premium que ofrece todas las funcionalidades disponibles',
            'precio' => 40,
            'descuento' => 10,
        ]);
    }
}
