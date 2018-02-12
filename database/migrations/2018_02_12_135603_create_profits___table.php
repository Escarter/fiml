<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('starting_balance')->nullable();
            $table->string('ending_balance')->nullable();
            $table->string('profit');
            $table->enum('month',['January','February','March','April','May','June','July','August','September','October','November','December']);

            $table->timestamps();

            $table->foreign('user_id')->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->index('month');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profits');
    }
}
