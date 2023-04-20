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
            $table->string('lugar',599)->nullable();
            $table->string('dispositivo')->nullable();
            $table->string('navegador')->nullable();
            $table->string('version')->nullable();
            $table->timestamps();

            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->datetime('created_permission')->nullable();

            $table->string('ipjs')->nullable();
            $table->string('city')->nullable();
            $table->string('continent')->nullable();
            $table->string('country')->nullable();
            $table->string('country_capital')->nullable();
            $table->string('country_code')->nullable();
            $table->string('country_phone')->nullable();
            $table->string('currency')->nullable();
            $table->string('isp')->nullable();
            $table->string('currency_rates')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('region')->nullable();
            $table->string('timezone')->nullable();
            $table->datetime('created_ip_location')->nullable();

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
