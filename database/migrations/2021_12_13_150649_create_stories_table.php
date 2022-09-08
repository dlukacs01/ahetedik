<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stories', function (Blueprint $table) {
            $table->id();

            // every time we delete a user that owns a story, its going to delete that users story with it
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('title');
            $table->string('slug');
            $table->date('expiration_date');
            $table->text('story_image')->nullable()->default('images/default_story_image.jpg');
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
        Schema::dropIfExists('stories');
    }
}
