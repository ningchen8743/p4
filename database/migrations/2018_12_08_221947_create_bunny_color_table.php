<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBunnyColorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bunny_color', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();

            # `bunny_id` and `color_id` are foreign keys, so they are unsigned
            # `bunny_id` references the `bunnies table` and `color_id` references the `colors` table.
            $table->integer('bunny_id')->unsigned();
            $table->integer('color_id')->unsigned();

            # Make foreign keys
            $table->foreign('bunny_id')->references('id')->on('bunnies');
            $table->foreign('color_id')->references('id')->on('colors');
        });
    }

    public function down()
    {
        Schema::dropIfExists('bunny_color');
    }
}
