<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();

            // every time we delete a heading that owns an article, its going to delete that headings article with it
            $table->foreignId('heading_id')->constrained()->onDelete('cascade');

            // every time we delete a user that owns an article, its going to delete that users article with it
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');

            $table->string('title')->nullable();
            $table->text('body');
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
        Schema::dropIfExists('articles');
    }
}
