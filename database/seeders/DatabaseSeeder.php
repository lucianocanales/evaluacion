<?php

namespace Database\Seeders;

use App\Models\articles;
use App\Models\HistoriInventories;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*
         * llama a los metodos factory de los dos modelos creados
         * */
        articles::factory(100)->create();
        HistoriInventories::factory(10000)->create();
    }
}
