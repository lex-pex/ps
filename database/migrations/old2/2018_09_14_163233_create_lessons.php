<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {


            $table->increments('id');

            $table->integer('rubric_id')->unsigned()->default(1);

            $table->string('name');
            $table->string('alias');
            $table->string('description')->default('');

            $table->text('text');

            $table->string('image')->default('');
            $table->smallInteger('sort_order')->default(0);
            $table->smallInteger('status')->default(0);
            $table->timestamps();

            $table->foreign('rubric_id')->references('id')->on('rubrics');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
