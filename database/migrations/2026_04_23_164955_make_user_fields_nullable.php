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
            // Foreign key cheklovlarni olib tashlash
            $table->dropForeign(['department_id']);
            $table->dropForeign(['qualification_id']);

            // Ustunlarni nullable qilish
            $table->string('avatar_url')->nullable()->change();
            $table->integer('department_id')->unsigned()->nullable()->change();
            $table->integer('qualification_id')->unsigned()->nullable()->change();

            // Foreign key cheklovlarni qayta qo'shish (nullable bilan)
            $table->foreign('department_id')->references('id')->on('departments')->nullOnDelete();
            $table->foreign('qualification_id')->references('id')->on('qualifications')->nullOnDelete();
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
            $table->dropForeign(['department_id']);
            $table->dropForeign(['qualification_id']);

            $table->string('avatar_url')->nullable(false)->change();
            $table->integer('department_id')->unsigned()->nullable(false)->change();
            $table->integer('qualification_id')->unsigned()->nullable(false)->change();

            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('qualification_id')->references('id')->on('qualifications');
        });
    }
};
