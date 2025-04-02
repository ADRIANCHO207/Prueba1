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
        Schema::create('retiros', function (Blueprint $table) {
            $table->id(); // id_retiro (se genera automáticamente)
            $table->bigInteger('documento'); // Relación con usuario
            $table->decimal('saldo_anterior', 10, 2); // Saldo antes del retiro
            $table->decimal('monto', 10, 2); // Monto retirado
            $table->decimal('saldo_actual', 10, 2); // Saldo después del retiro
            

            // Definir clave foránea con la tabla `usuarios`
            $table->foreign('documento')
                  ->references('documento')
                  ->on('usuarios')
                  ->onDelete('cascade');

            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retiros');
    }
};

