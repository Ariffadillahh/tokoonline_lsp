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
        Schema::create('bokings', function (Blueprint $table) {
            $table->id("id_b");
            $table->string("id_buku");
            $table->string("nama_peminjam");
            $table->string("tgl_pinjam");
            $table->string("tgl_balikin");
            $table->string("nama_penjaga");
            $table->string("id_user");
            $table->string("no_hp");
            $table->string("status");
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
        Schema::dropIfExists('bokings');
    }
};
