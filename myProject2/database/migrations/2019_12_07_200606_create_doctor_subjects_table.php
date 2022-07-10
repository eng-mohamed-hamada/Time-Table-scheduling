<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id')->unsigned()->index();
            $table->string('subject_code')->index();
            $table->integer('teach_method_id')->unsigned()->index()->nullable();
            $table->integer('devision_type_id')->unsigned()->index()->nullable();
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
        Schema::dropIfExists('doctor_subjects');
    }
}
