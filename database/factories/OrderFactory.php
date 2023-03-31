<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'jumlah_order' => rand(1,10),
            'user_id' => rand(1,10),
            'ruangan_id'=> rand(1,10),
            'product_id'=> rand(1,4),
            // $table->string('jumlah_order');
            // $table->foreignId('user_id')->constrained()
            // ->onUpdate('cascade')
            // ->onDelete('cascade'); 
            // $table->foreignId('ruangan_id')->constrained()
            // ->onUpdate('cascade')
            // ->onDelete('cascade'); 
            // $table->foreignId('product_id')->constrained()
            // ->onUpdate('cascade')
            // ->onDelete('cascade'); 
        ];
    }
}
