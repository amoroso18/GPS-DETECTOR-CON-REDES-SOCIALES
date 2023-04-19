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
                    'red_social' => 'YOUTUBE',
                    'celular' => 'defaul.jpg',
                    'tableta' => 'defaul.jpg',
                    'computadora' => 'defaul.jpg',
                ],
                [
                    'red_social' => 'FACEBOOK',
                    'celular' => 'defaul.jpg',
                    'tableta' => 'defaul.jpg',
                    'computadora' => 'defaul.jpg',
                ],
                [
                    'red_social' => 'WHATSAPP',
                    'celular' => 'defaul.jpg',
                    'tableta' => 'defaul.jpg',
                    'computadora' => 'defaul.jpg',
                ],
                [
                    'red_social' => 'TELEGRAM',
                    'celular' => 'defaul.jpg',
                    'tableta' => 'defaul.jpg',
                    'computadora' => 'defaul.jpg',
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
