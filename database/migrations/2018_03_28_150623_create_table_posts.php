<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('posts', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('category_id');
           $table->string('title');
           $table->longText('description');
           $table->date('date_init');
           $table->string('hour');
           $table->string('place');
           $table->string('entrytype');
           $table->double('price', 8, 2);
           $table->string('webfacebook')->nullable();
           $table->string('email');
           $table->string('image')->nullable();
           $table->boolean('approved')->nullable();
           $table->boolean('sticky')->nullable();
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
         Schema::dropIfExists('posts');
     }
}
