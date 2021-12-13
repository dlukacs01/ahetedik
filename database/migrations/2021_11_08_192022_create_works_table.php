<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');

            // every time we delete a category that owns a work, its going to delete the categories work with it
            // $table->foreignId('category_id')->constrained()->onDelete('cascade');

            // every time we delete a user that owns a post, its going to delete that users post with it
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // not every work has its own image
            $table->text('work_image')->nullable();

            $table->text('body');

            $table->integer('active');
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
        Schema::dropIfExists('works');
    }
}
