<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('part_id')->unsigned()->default(1);

            $table->string('name');
            $table->string('alias');
            $table->string('description')->default('');
            $table->string('image')->default('');
            $table->smallInteger('sort_order')->default(0);
            $table->smallInteger('status')->default(0);
            $table->timestamps();

            $table->foreign('part_id')->references('id')->on('parts');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
