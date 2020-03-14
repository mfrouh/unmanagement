<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestgroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restgroups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('group_id')->unique();
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->json('days')->default('["0"]');
            $table->json('time')->default('["0"]');
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
        Schema::dropIfExists('restgroups');
    }
}
