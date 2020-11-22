<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQaTable extends Migration
{
    public function up()
    {
        Schema::create('qa', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('answers');
            $table->string('questions');
            $table->text('description')->nullable();
        });
    }
    public function down()
    {
        Schema::dropIfExists('qa');
    }
}
