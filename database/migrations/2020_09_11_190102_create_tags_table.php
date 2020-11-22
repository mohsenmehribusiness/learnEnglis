<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateTagsTable extends Migration
{
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('tag')->unique();
        });
        Schema::create('tag_word', function (Blueprint $table) {
            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
            $table->unsignedBigInteger('word_id');
            $table->foreign('word_id')->references('id')->on('words')->onDelete('cascade');
            $table->unique(['tag_id','word_id']);
        });
        Schema::create('sentence_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
            $table->unsignedBigInteger('sentence_id');
            $table->foreign('sentence_id')->references('id')->on('sentences')->onDelete('cascade');
            $table->unique(['tag_id','sentence_id']);
        });
        Schema::create('lesson_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
            $table->unsignedBigInteger('lesson_id');
            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
            $table->unique(['tag_id','lesson_id']);
        });
        Schema::create('qa_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
            $table->unsignedBigInteger('qa_id');
            $table->foreign('qa_id')->references('id')->on('qa')->onDelete('cascade');
            $table->unique(['tag_id','qa_id']);
        });
    }
    public function down(){
        Schema::dropIfExists('tag_word');
        Schema::dropIfExists('sentence_tag');
        Schema::dropIfExists('qa_tag');
        Schema::dropIfExists('lesson_tag');
        Schema::dropIfExists('tags');
    }
}
