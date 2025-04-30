<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterMediaTable extends Migration
{
    public function up()
    {
        Schema::create('character_media', function (Blueprint $table) {
            $table->foreignId('character_id')
                  ->constrained()
                  ->onDelete('cascade');
            $table->foreignId('media_id')
                  ->constrained()
                  ->onDelete('cascade');
            $table->primary(['character_id','media_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('character_media');
    }
}
