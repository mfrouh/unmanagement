<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('lang',['ar','en'])->default('en');
            $table->unsignedbigInteger('group_id')->nullable();
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->unsignedbigInteger('sectiongroup_id')->nullable();
            $table->foreign('sectiongroup_id')->references('id')->on('sectiongroups')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->string('image')->default('1.png');
            $table->enum('role',['admin','student','teacherassistant','teacher']);
            $table->string('phone_number');
            $table->string('date_of_birth');
            $table->string('address');
            $table->enum('gender',['male','female'])->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
