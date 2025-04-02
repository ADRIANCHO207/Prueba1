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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigInteger('documento')->primary();
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('correo');
            $table->decimal('saldo', 10, 2)->default(0);
            $table->string('ciudad_nac');
            $table->string('password');
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
