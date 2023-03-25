<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RuanganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_ruangan' => $this->faker->name(). " ruangan", 
            'no_telephone' => $this->faker->phoneNumber(),
            'status' => 'aktif',
            // 'user_id' => 1
        ];
    }
}
