<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BlogTable extends Migration
{
    /**
     * Run the migrations.  2022_02_07_132655_
     *
     * @return void
     */
    public function up()
    {
       Schema::create('blog',function (Blueprint $table){
           $table->id();
           $table->string('title',100)->comment('Заголовок блога');
           $table->string('slug')->unique()->index()->comment('Уникальное имя блога');
           $table->unsignedBigInteger('author_id')->comment('Id создателя блога');
           $table->text('text')->comment('Текст блога');
           $table->string('description',255)->comment('Короткий текст блога');
           $table->string('picture')->comment('Картинка блога');
           $table->unsignedBigInteger('category_id')->comment('Id категории блога');
           $table->timestamps();

           $table->foreign('category_id')->references('id')->on('blog_category')->onDelete('cascade');
           $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::dropIfExists('blog');
    }
}
