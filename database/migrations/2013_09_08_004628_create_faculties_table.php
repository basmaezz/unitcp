<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacultiesTable extends Migration
{

    public function up()
    {
        Schema::create('faculties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_ar');
            $table->string('name_en');
            $table->integer('active');
            $table->integer('parent_id');
            $table->integer('ordering');
            $table->timestamps();
            $table->softDeletes();
        });

//        Schema::table('users', function (Blueprint $table) {
//            $table->integer('faculty_id')->unsigned()->index();
//            $table->foreign('faculty_id')->references('id')->on('faculties')->onDelete('cascade');
//        });
//
//        Schema::table('classes', function (Blueprint $table) {
//            $table->integer('faculty_id')->unsigned()->index();
//            $table->foreign('faculty_id')->references('id')->on('faculties')->onDelete('cascade');
//        });
//
//
//
//        Schema::table('departments', function (Blueprint $table) {
//            $table->integer('faculty_id')->unsigned()->index();
//            $table->foreign('faculty_id')->references('id')->on('faculties')->onDelete('cascade');
//        });
//
//        Schema::table('materials', function (Blueprint $table) {
//            $table->integer('faculty_id')->unsigned()->index();
//            $table->foreign('faculty_id')->references('id')->on('faculties')->onDelete('cascade');
//        });
//
//
//        Schema::table('semesters', function (Blueprint $table) {
//            $table->integer('faculty_id')->unsigned()->index();
//            $table->foreign('faculty_id')->references('id')->on('semesters')->onDelete('cascade');
//        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faculties');
    }
}
