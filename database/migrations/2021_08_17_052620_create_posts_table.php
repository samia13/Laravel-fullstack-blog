<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt');
            $table->text('body');
            $table->boolean('featured')->default(false);
            $table->string('image');
            $table->timestamps();
        });

        Schema::create('category_post', function(Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')
                  ->constrained()
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreignId('post_id')
                  ->constrained()
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });

        Schema::create('post_tag', function(Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')
                  ->constrained()
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreignId('tag_id')
                  ->constrained()
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
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
        Schema::dropIfExists('category_post');
        Schema::dropIfExists('post_tag');
    }
}
