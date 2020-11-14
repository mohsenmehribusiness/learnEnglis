<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreatePersiansTable extends Migration
{
    public function up()
    {
        Schema::create('persians', function (Blueprint $table) {
            $table->id();
            $table->text('persian')->unique();
        });
        Schema::create('persian_word', function (Blueprint $table) {
            $table->unsignedBigInteger('persian_id');
            $table->foreign('persian_id')->references('id')->on('persians')->onDelete('cascade');
            $table->unsignedBigInteger('word_id');
            $table->foreign('word_id')->references('id')->on('words')->onDelete('cascade');
            $table->unique(['persian_id','word_id']);
        });
        Schema::create('persian_sentence', function (Blueprint $table) {
            $table->unsignedBigInteger('persian_id');
            $table->foreign('persian_id')->references('id')->on('persians')->onDelete('cascade');
            $table->unsignedBigInteger('sentence_id');
            $table->foreign('sentence_id')->references('id')->on('sentences')->onDelete('cascade');
            $table->unique(['persian_id','sentence_id']);
        });
    }

   public function down()
    {
        Schema::dropIfExists('persian_word');
        Schema::dropIfExists('persian_sentence');
        Schema::dropIfExists('persians');
    }
}
