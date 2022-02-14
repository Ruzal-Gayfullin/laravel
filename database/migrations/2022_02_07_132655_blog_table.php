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
           $table->foreignId('author_id')->comment('Id создателя блога');
           $table->text('text')->comment('Текст блога');
           $table->string('description',255)->comment('Короткий текст блога');
           $table->string('picture')->comment('Картинка блога');
           $table->foreignId('category_id')->comment('Id категории блога');
           $table->timestamps();
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
