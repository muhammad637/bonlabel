<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRuangansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ruangans', function (Blueprint $table) {
            $table->id('id_ruangan');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->string('nama_ruangan');
            $table->enum('status', ['aktif', 'tidak aktif']);
            $table->string('no_telephone');
            $table->timestamps();
            $table->foreign('id_user')->references('id_user')->on('users.id_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ruangans');
    }
}
