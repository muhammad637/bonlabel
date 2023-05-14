<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id');
            $table->string('username');
            $table->string('password');
            $table->string('nik')->nullable();
            $table->string('nama');
            $table->enum('cekLevel',['admin','user'])->default('admin');
            // $table->tinyInteger('cekLevel')->default(0);
            $table->enum('status',['aktif','nonaktif']);
            // $table->json('ruangans')->nullable();
            $table->string('no_telephone');
            $table->string('gambar')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
