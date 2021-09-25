<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePneumaticPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pneumatic_parts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('quantity');
            $table->string('part');
            $table->unsignedInteger('tube_size');
            $table->string('description','255');
            $table->boolean('warranty');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('pneumatic_parts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pneumatic_parts');
    }
}
