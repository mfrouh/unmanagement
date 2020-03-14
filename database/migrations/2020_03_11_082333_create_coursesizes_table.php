<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coursesizes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('subject_id')->unique();
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('CASCADE')->onUpdate('CASCADE');
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
        Schema::dropIfExists('coursesizes');
    }
}
