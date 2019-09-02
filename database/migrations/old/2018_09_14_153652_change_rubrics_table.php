<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeRubricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rubrics', function (Blueprint $table) {
            $table->integer('cat_id')->unsigned()->default(1)->after('id');
            $table->foreign('cat_id')->references('id')->on('cats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rubrics', function (Blueprint $table) {

            $table->dropForeign('cat_id');

            $table->dropColumn('cat_id');

        });
    }
}
