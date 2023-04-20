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
        Schema::create('tipo_fondo_pantallas', function (Blueprint $table) {
            $table->id();
            $table->string('red_social')->nullable();
            $table->string('ruta')->default('redes/');
            $table->string('celular')->nullable();
            $table->string('tableta')->nullable();
            $table->string('computadora')->nullable();
            $table->timestamps();
        });
        DB::table('tipo_fondo_pantallas')->insert(
            array(
                [
                    'red_social' => 'YOUTUBE WHITE',
                    'celular' => 'redes/white_youphone.jpg',
                    'tableta' => 'redes/white_youtablet.jpg',
                    'computadora' => 'redes/white_youdesktop.jpg',
                ],
                [
                    'red_social' => 'YOUTUBE DARK',
                    'celular' => 'redes/youphone.jpg',
                    'tableta' => 'redes/youtablet.jpg',
                    'computadora' => 'redes/youdesktop.jpg',
                ],
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_fondo_pantallas');
    }
};
