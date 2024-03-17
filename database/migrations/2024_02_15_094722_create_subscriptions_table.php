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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->boolean('active')->default(false);; // Puedes almacenar el tipo de plan aquí (básico, estándar, premium, etc.)
            $table->dateTime('start_date'); // Fecha de inicio de la suscripción
            $table->dateTime('end_date'); // Fecha de finalización de la suscripción
            $table->timestamps();
        
            // Clave foránea para relacionar la suscripción con el usuario
            $table->foreign('user_id')->unique()->references('id')->on('users')->onDelete('cascade');        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
