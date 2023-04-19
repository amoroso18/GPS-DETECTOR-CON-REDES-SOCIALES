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
        Schema::create('enlaces_detectors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('enlaces_id');
            $table->string('modalidad_ingreso')->nullable();
            $table->string('ip')->nullable();
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->timestamps();
        });
        Schema::table('enlaces_detectors', function(Blueprint $table) {
            $table->foreign('enlaces_id')->references('id')->on('enlaces');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enlaces_detectors');
    }
};
