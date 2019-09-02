<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SetUniqueAliases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('categories', function (Blueprint $table) {

            $table->unique('alias');

        });

        Schema::table('rubrics', function (Blueprint $table) {

            $table->unique('alias');

        });

        Schema::table('lessons', function (Blueprint $table) {

            $table->unique('alias');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('categories', function (Blueprint $table) {

            $table->dropUnique('alias');

        });

        Schema::table('rubrics', function (Blueprint $table) {

            $table->dropUnique('alias');

        });

        Schema::table('lessons', function (Blueprint $table) {

            $table->dropUnique('alias');

        });

    }
}
