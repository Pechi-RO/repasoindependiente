<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso>
 */
class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {


        $this->faker->addProvider(new \Mmo\Faker\PicsumProvider($this->faker));

        return [
            'nombre'=>$this->faker->name(),
            'descripcion'=>$this->faker->text(),
            'activo'=>$this->faker->numberBetween(1,2),
            'imagen'=>'cursos/'.$this->faker->picsum('public/storage/cursos','640','480',null,false),
            'category_id'=>Category::all()->random()->id

        ];
    }
}
