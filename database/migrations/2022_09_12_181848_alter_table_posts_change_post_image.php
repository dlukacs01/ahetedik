<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablePostsChangePostImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::statement('ALTER TABLE `posts` CHANGE COLUMN `post_image` `post_image` VARCHAR(255) DEFAULT "images/default_post_image.jpg";');

        Schema::table('posts', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            //
        });
    }
}
