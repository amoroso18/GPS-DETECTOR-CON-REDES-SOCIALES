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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('estado');
            $table->integer('users_create_id')->nullable();
            $table->integer('users_modifica_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
        DB::table('users')->insert(
            array(
                [
                    'name' => 'ROOT',
                    'email' => 'ROOT@codeplayshop.com',
                    'password' => '$2y$10$l.duPE6wrskJXDUoHBYeE.7zgQTiRols1hgsVwKuKX5vwasy.iCuO', // 123456
                    'estado' => 1
                ],
            )
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
