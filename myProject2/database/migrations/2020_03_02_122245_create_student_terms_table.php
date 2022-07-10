<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_terms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_id')->index();
            $table->integer('term_id')->unsigned()->index();
            $table->float('term_gpa')->default('0');
            $table->string('term_evaluation')->nullable();
            $table->float('term_gainded_points')->default('0');
            $table->integer('term_gainded_hours')->default('0');
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
        Schema::dropIfExists('student_terms');
    }
}
