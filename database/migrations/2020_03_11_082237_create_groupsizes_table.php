<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groupsizes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('group_id')->unique();
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->json('table')->default('["0"]');
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
        Schema::dropIfExists('groupsizes');
    }
}
