<?php

namespace Database\Factories;

use App\Models\articles;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticlesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = articles::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /*
         * Carga la tabla de artículos con contenido de prueba
         */
        $number = $this->faker->unique()->randomNumber($nbDigits = NULL, $strict = false);
        return [
            'number' => $number,
            'description' => $this->faker->text(800),
            'inventario' => $this->faker->randomDigit(1, 9999),
            'street' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'province' => $this->faker->state(),
            'country' => $this->faker->country(),

        ];
    }
}
