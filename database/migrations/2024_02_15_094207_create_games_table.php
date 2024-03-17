<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->integer('stock')->default(0); // Columna para el stock del juego
            $table->string('image')->nullable(); // Columna para la imagen del juego
            $table->string('developer')->nullable(); // Columna para el desarrollador del juego
            $table->date('release_date')->nullable(); // Columna para la fecha de lanzamiento del juego
            $table->string('genre')->nullable(); // Columna para el género del juego
            $table->string('key')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('games');
    }
}
