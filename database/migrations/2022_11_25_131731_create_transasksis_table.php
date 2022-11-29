<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransasksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transasksis', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('konser_id');
            $table->unsignedBigInteger('user_id');
            $table->string('nama');
            $table->string('email');
            $table->string('no_hp');
            $table->string('jumlah_tiket');
            $table->string('total_harga');
            $table->string('status');

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
        Schema::dropIfExists('transasksis');
    }
}
