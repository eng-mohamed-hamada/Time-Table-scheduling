<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_id')->index();
            $table->string('subject_code')->index();
            $table->float('mark')->nullable();
            $table->float('points')->nullable();
            $table->integer('gained_hours')->nullable();
            $table->string('gpa')->nullable();
            $table->integer('student_term_id')->unsigned()->index();
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
        Schema::dropIfExists('student_subjects');
    }
}
