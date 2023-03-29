<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'nama_product' => $this->faker->name()." produck",
            'jenis_product' => Str::random(5),
            'limit_order' => rand(5,20),
            'jumlah_stock' =>rand(20,40)
        ];
    }
}
