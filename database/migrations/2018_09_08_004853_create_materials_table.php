<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('faculty_id')->unsigned()->index();
            $table->integer('class_id')->unsigned()->index();
            $table->integer('semester_id')->unsigned()->index();
            $table->integer('department_id')->unsigned()->index();
            $table->string('name_ar');
            $table->string('name_en');
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
        Schema::dropIfExists('materials');
    }
}
