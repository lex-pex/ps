<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRubrics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rubrics', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('category_id')->unsigned()->default(1);

            $table->string('name');
            $table->string('alias');
            $table->string('description')->default('');
            $table->string('image')->default('');
            $table->smallInteger('sort_order')->default(0);
            $table->smallInteger('status')->default(0);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rubrics');
    }
}
