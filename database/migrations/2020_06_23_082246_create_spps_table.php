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
            $table->string('januari')->default(json_encode(['Belum Bayar', 'Belum Bayar']));
            $table->string('februari')->default(json_encode(['Belum Bayar', 'Belum Bayar']));
            $table->string('maret')->default(json_encode(['Belum Bayar', 'Belum Bayar']));
            $table->string('april')->default(json_encode(['Belum Bayar', 'Belum Bayar']));
            $table->string('mei')->default(json_encode(['Belum Bayar', 'Belum Bayar']));
            $table->string('juni')->default(json_encode(['Belum Bayar', 'Belum Bayar']));
            $table->string('juli')->default(json_encode(['Belum Bayar', 'Belum Bayar']));
            $table->string('agustus')->default(json_encode(['Belum Bayar', 'Belum Bayar']));
            $table->string('september')->default(json_encode(['Belum Bayar', 'Belum Bayar']));
            $table->string('oktober')->default(json_encode(['Belum Bayar', 'Belum Bayar']));
            $table->string('november')->default(json_encode(['Belum Bayar', 'Belum Bayar']));
            $table->string('desember')->default(json_encode(['Belum Bayar', 'Belum Bayar']));

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
