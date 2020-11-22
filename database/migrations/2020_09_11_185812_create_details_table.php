<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->bigInteger('id',true);
            $table->bigInteger('foreign_id');
            $table->string('usage');//sentence|word|qa
            $table->boolean('state')->default(false);// یاد گرفتم - یاد نگرفتم
            $table->integer('star')->default(0);//تقسیم بندی بر اساس ستاره
            $table->integer('repeat')->default(0);// تعداد تکرار برای یاد گیری
            $table->unique(['foreign_id','usage']);
        });
    }
    public function down()
    {
        Schema::dropIfExists('details');
    }
}
