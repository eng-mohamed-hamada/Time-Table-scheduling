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
            $table->string('id')->primary();
            $table->string('name');
            $table->integer('level_id')->unsigned()->index();
            $table->string('depart_id')->index()->nullable();
            $table->integer('level_group_id')->unsigned()->index()->nullable();
            $table->float('total_gpa')->unsigned()->default(0);
            $table->float('total_gained_points')->unsigned()->default(0);
            $table->integer('total_gained_hours')->unsigned()->default(0);
            $table->string('total_evaluation')->default('0');
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
