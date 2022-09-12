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

            // every time we delete a user that owns a work, its going to delete that users work with it
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            $table->string('title');
            $table->string('slug');
            $table->date('release_date');
            $table->text('work_image')->nullable()->default('images/default_work_image.jpg');
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
