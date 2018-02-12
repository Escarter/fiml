<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAffiliatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('affiliates', function (Blueprint $table) {
            $table->integer('master_owner_id')->unsigned();
           $table->integer('affliate_id')->unsigned();

          $table->foreign('master_owner_id')->references('id')
                                          ->on('users')
                                          ->onDelete('cascade');

          $table->foreign('affliate_id')->references('id')
                                          ->on('users')
                                          ->onDelete('cascade');

         $table->primary(['master_owner_id','affliate_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('affiliates');
    }
}
