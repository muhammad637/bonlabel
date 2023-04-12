<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotifikasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifikasis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_table')->nullable();    
            $table->enum('jenis_notifikasi', ['tambah', 'update', 'aktif', 'nonaktif']);
            $table->enum('status', ['berhasil', 'gagal']);
            $table->string('order_status')->nullable();
            $table->string('msg');
            $table->enum('mark', ['false', 'true']);
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
        Schema::dropIfExists('notifikasis');
    }
}
