<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('words', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('english');
            $table->string('persian');
            $table->string('sentence')->nullable();
            $table->string('tag')->nullable();
            $table->string('lesson')->nullable();
            $table->boolean('state')->default(false);
            $table->integer('star')->default(0);
        });
    }
        /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('words');
    }
}
