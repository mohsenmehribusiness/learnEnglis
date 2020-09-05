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
            $table->string('english');// کلمه اصلی
            $table->string('persian');// معنی کلمه
            $table->string('sentence')->nullable();//جملاتی که توش به کار میره یک کلمه
            $table->string('tag')->nullable();//برچسب برای پیدا کردن
            $table->string('lesson')->nullable();//تقسیم بندی کلمات بر اساس درس
            $table->boolean('state')->default(false);// یاد گرفتم - یاد نگرفتم
            $table->float('star')->default(0);//تقسیم بندی بر اساس ستاره
            $table->integer('repeat')->default(0);// تعداد تکرار برای یاد گیری
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
