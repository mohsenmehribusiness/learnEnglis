<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSentencesTable extends Migration
{
    public function up()
    {
        Schema::create('sentences', function (Blueprint $table) {
            $table->id();
            $table->text('sentence')->unique();
        });

        Schema::create('sentence_word', function (Blueprint $table) {
            $table->unsignedBigInteger('sentence_id');
            $table->foreign('sentence_id')->references('id')->on('sentences')->onDelete('cascade');
            $table->unsignedBigInteger('word_id');
            $table->foreign('word_id')->references('id')->on('words')->onDelete('cascade');
            $table->unique(['sentence_id','word_id']);
        });
    }
    public function down()
    {
        Schema::dropIfExists('sentence_word');
        Schema::dropIfExists('sentences');
    }
}
