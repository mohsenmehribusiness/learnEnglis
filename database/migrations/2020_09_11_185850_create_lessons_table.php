<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('lesson');
            $table->text('description')->nullable();//تقسیم بندی کلمات بر اساس درس
        });

        Schema::create('lesson_word', function (Blueprint $table) {
            $table->unsignedBigInteger('lesson_id');
            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
            $table->unsignedBigInteger('word_id');
            $table->foreign('word_id')->references('id')->on('words')->onDelete('cascade');
            $table->unique(['lesson_id','word_id']);
        });

        Schema::create('lesson_sentence', function (Blueprint $table) {
            $table->unsignedBigInteger('lesson_id');
            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
            $table->unsignedBigInteger('sentence_id');
            $table->foreign('sentence_id')->references('id')->on('sentences')->onDelete('cascade');
            $table->unique(['lesson_id','sentence_id']);
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lesson_word');
        Schema::dropIfExists('lesson_sentence');
        Schema::dropIfExists('lessons');
    }
}
