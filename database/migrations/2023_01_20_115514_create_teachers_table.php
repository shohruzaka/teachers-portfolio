<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            // $table->increments('id');
            // $table->string('first_name',100);
            // $table->string('last_name',100);
            // $table->string('email',200)->unique();
            // $table->string('password');
            // $table->string('avatar_url');
            // $table->integer('department_id')->unsigned();
            // $table->integer('qualification_id')->unsigned();
            // $table->foreign('department_id')->references('id')->on('departments');
            // $table->foreign('qualification_id')->references('id')->on('qualifications');

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
        Schema::dropIfExists('teachers');
    }
};
