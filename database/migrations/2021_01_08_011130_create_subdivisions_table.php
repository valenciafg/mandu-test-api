<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubdivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subdivisions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('division_id')->unsigned();
            $table->integer('child_id')->unsigned();

            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');
            $table->foreign('child_id')->references('id')->on('divisions')->onDelete('cascade');

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
        Schema::dropIfExists('subdivisions');
    }
}
