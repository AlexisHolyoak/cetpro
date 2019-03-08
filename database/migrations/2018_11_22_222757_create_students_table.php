<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_code')->unique();
            $table->string('external_student_code')->nullable();
            $table->date('birthday_date');
            $table->boolean('gender')->default(0);
            $table->string('civil_status');
            $table->string('document_type');
            $table->string('document_number')->unique();
            $table->string('education_level');
            $table->boolean('worker')->default(0);
            $table->string('occupation')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('cellphone_number');
            $table->string('meet_way');
            $table->string('photo_path')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('students');
    }
}
