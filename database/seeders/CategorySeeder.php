<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category=[
            'Programacion'=>'Descripcion Programación',
            'Bases de datos'=>'Descripcion BBDD',
            'Sistemas'=>'Descripcion Sistemas',
            'Diseño'=>'Descripcion Diseño',
            'Redes'=>'Descripcion Redes'

        ];

        foreach($category as $k=>$v)[
            \App\Models\Category::factory()->create([
                'nombre'=>$k,
                'descripcion'=>$v
            ])
        ];
    }
}
