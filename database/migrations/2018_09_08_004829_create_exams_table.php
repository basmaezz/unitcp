<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('faculty_id')->unsigned()->index();
            $table->integer('class_id')->unsigned()->index();
            $table->integer('semester_id')->unsigned()->index();
            $table->integer('department_id')->unsigned()->index();
            $table->integer('material_id')->unsigned()->index();
            $table->integer('year_id')->unsigned()->index();
            $table->string('file');
            $table->integer('views_num')->nullable();
            $table->integer('download_num')->nullable();
            $table->string('key_search_ar')->nullable();
            $table->string('key_search_en')->nullable();
            $table->timestamps();
            $table->softDeletes();
			$table->foreign('faculty_id')->references('id')->on('faculties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams');
    }
}
