<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::Create('canciones', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->bigInteger('cantante_id')->unsigned();
            $table->foreign('cantante_id')->references('id')->on('cantantes')->onDelete('cascade');
            $table->bigInteger('playlist_id')->unsigned();
            $table->foreign('playlist_id')->references('id')->on('playlists')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('canciones');
    }
};
