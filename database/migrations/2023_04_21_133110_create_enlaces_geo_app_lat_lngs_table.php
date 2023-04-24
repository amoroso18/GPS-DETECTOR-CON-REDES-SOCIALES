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
        Schema::create('enlaces_geo_app_lat_lngs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('enlaces_geo_apps_id');
            $table->string('latitud')->nullable();
            $table->string('longitud')->nullable();
            $table->unsignedBigInteger('users_create_id');
            $table->timestamps();
        });
        Schema::table('enlaces_geo_app_lat_lngs', function(Blueprint $table) {
            $table->foreign('enlaces_geo_apps_id')->references('id')->on('enlaces_geo_apps');
            $table->foreign('users_create_id')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('enlaces_geo_app_lat_lngs');
    }
};
