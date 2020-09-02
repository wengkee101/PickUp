<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRateQuantitytoTeaSersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tea_sers', function (Blueprint $table) {
            $table->integer('rate')->after('price');
            $table->integer('quantity')->after('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tea_sers', function (Blueprint $table) {
            $table->integer('rate')->after('price');
            $table->integer('quantity')->after('price');
        });
    }
}
