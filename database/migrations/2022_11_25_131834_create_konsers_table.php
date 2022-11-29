<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konsers', function (Blueprint $table) {
            $table->id();

            $table->string('nama');
            $table->string('tanggal');
            $table->string('tempat');
            $table->string('harga');
            $table->string('deskripsi');
            $table->string('poster');
            
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
        Schema::dropIfExists('konsers');
    }
}
