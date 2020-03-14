<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectiontablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sectiontables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tid');
            $table->integer('sat')->nullable();
            $table->integer('sun')->nullable();
            $table->integer('mon')->nullable();
            $table->integer('thus')->nullable();
            $table->integer('wed')->nullable();
            $table->integer('thur')->nullable();
            $table->integer('tableid');
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
        Schema::dropIfExists('sectiontables');
    }
}
