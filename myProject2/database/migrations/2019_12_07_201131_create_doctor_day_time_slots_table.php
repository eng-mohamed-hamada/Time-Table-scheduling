<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorDayTimeSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_day_time_slots', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doctor_id')->unsigned()->index();
            $table->integer('day_time_slots_id')->unsigned()->index();
            $table->integer('doctor_subject_id')->unsigned()->index();
            $table->integer('place_id')->nullable()->unsigned()->index();
            $table->integer('level_group_id')->nullable()->unsigned()->index();
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
        Schema::dropIfExists('doctor_day_time_slots');
    }
}
