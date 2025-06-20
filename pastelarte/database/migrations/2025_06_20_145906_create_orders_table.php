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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('delivery_date');
            $table->enum('status', ['pendiente', 'en_produccion', 'listo', 'entregado'])->default('pendiente');
            $table->decimal('precio_total', 8, 2)->default(0);
            $table->text('mensaje_personalizado')->nullable();
            $table->string('imagen_referencia')->nullable(); // ruta al archivo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
