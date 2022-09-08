<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeadingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('headings', function (Blueprint $table) {
            $table->id();

            // every time we delete a post that owns a heading, its going to delete that posts heading with it
            $table->foreignId('post_id')->constrained()->onDelete('cascade');

            $table->string('type');
            $table->string('title');
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
        Schema::dropIfExists('headings');
    }
}
