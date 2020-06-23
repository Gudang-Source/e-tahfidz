<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spps', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('tahun');
            $table->string('januari')->default('Belum Bayar');
            $table->string('februari')->default('Belum Bayar');
            $table->string('maret')->default('Belum Bayar');
            $table->string('april')->default('Belum Bayar');
            $table->string('mei')->default('Belum Bayar');
            $table->string('juni')->default('Belum Bayar');
            $table->string('juli')->default('Belum Bayar');
            $table->string('agustus')->default('Belum Bayar');
            $table->string('september')->default('Belum Bayar');
            $table->string('oktober')->default('Belum Bayar');
            $table->string('november')->default('Belum Bayar');
            $table->string('desember')->default('Belum Bayar');

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
        Schema::dropIfExists('spps');
    }
}
