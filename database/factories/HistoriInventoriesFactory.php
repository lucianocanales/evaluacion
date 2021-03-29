<?php

namespace Database\Factories;

use App\Models\HistoriInventories;
use App\Models\type;
use App\Models\articles;

use Illuminate\Database\Eloquent\Factories\Factory;

class HistoriInventoriesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HistoriInventories::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        /*
         * Carga la tabla de movimientos historicos con contenido de prueba
         */
        return [
            'amount' => $this->faker->randomDigit(2, 9999),
            'date' => $this->faker->date(),
            'type' => $this->faker->randomElement([
                'compra',
                'venta',
                'recuento',
            ]),
            'article_id' => articles::all()->random()->id,
        ];
    }
}
