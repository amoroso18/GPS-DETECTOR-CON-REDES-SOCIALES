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
        Schema::create('enlaces', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_fondo_pantallas_id');
            $table->string('descripcion')->nullable();
            $table->timestamps();
        });
        Schema::table('enlaces', function(Blueprint $table) {
            $table->foreign('tipo_fondo_pantallas_id')->references('id')->on('tipo_fondo_pantallas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enlaces');
    }
};
