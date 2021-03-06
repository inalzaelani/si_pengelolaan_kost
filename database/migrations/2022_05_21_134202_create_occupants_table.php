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
        Schema::create('occupants', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->string('level');
            $table->string('nama');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->biginteger('no_telp');
            $table->string('bukti_identitas');
            $table->integer('no_kamar');
            $table->string('tipe_kamar');
            $table->integer('harga_kamar');
            $table->enum('sewa', ['Bulanan', 'Tahunan']);
            $table->date('tanggal_bayar');
            $table->integer('total_bayar');
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
        Schema::dropIfExists('occupants');
    }
};
