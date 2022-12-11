<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sewa_motors', function (Blueprint $table) {
            $table->id();
            $table->string('lokasi');
            $table->string('tanggalPinjam');
            $table->string('tanggalKembali');
            $table->string('merkMotor');
            $table->string('jenisMotor');
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
        Schema::dropIfExists('sewa_motors');
    }
};
