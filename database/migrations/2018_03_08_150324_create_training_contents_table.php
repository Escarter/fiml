<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('cover_image')->nullable();
            $table->integer('video_category_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('url');
            $table->string('type');
            $table->text('content');
            $table->timestamps();

            $table->foreign('video_category_id')->references('id')
            ->on('video_categories')
            ->onDelete('cascade');
            $table->foreign('user_id')->references('id')
            ->on('users')
            ->onDelete('cascade');

            
            $table->index('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('training_contents');
    }
}
