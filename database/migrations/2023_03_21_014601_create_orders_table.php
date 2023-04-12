<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade'); 
            $table->foreignId('ruangan_id')->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade'); 
            $table->foreignId('product_id')->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade'); 
            $table->string('jumlah_order');
            $table->json('pesan')->nullable();
            $table->enum('status',['terima','tolak'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
