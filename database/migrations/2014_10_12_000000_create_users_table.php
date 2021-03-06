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
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('img')->nullable();
            $table->integer('faculty_id')->unsigned()->index()->nullable();//
            $table->integer('online')->nullable();
            $table->integer('active')->nullable();
            $table->integer('permission')->nullable();
            $table->timestamp('login_at');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
//			$table->foreign('faculty_id')->references('id')->on('faculties')->onDelete('cascade');
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
