<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('title');            // Título de la película o serie
            $table->string('classification');   // Género: drama, acción, etc.
            $table->date('release_date');       // Fecha de estreno
            $table->text('review');             // Reseña general
            $table->integer('season')->nullable(); // Temporada (nulo si es película)
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('media');
    }
}
