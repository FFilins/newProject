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
        Schema::create('autenticacaos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100); // VARCHAR 100 caracteres
            $table->string('email', 100);
            $table->char('senha', 32);
            $table->boolean('administrador')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autenticacaos');
    }
};
