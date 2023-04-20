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
            $table->string('ruta')->default('imagenes/sistema/');
            $table->string('celular')->nullable();
            $table->string('tableta')->nullable();
            $table->string('computadora')->nullable();
            $table->timestamps();
        });
        DB::table('tipo_fondo_pantallas')->insert(
            array(
                [
                    'red_social' => 'YOUTUBE WHITE',
                    'celular' => 'redes/white_youphone.png',
                    'tableta' => 'redes/white_youtablet.png',
                    'computadora' => 'redes/white_youdesktop.png',
                ],
                [
                    'red_social' => 'YOUTUBE DARK',
                    'celular' => 'redes/youphone.png',
                    'tableta' => 'redes/youtablet.png',
                    'computadora' => 'redes/youdesktop.png',
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
