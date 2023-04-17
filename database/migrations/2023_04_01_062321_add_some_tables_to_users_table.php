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
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('name','first_name');
            $table->string('last_name');
            $table->string('avatar_url');
            $table->integer('department_id')->unsigned();
            $table->integer('qualification_id')->unsigned();
            $table->tinyInteger('is_admin')->unsigned()->default('0')->after('avatar_url');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('qualification_id')->references('id')->on('qualifications');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
