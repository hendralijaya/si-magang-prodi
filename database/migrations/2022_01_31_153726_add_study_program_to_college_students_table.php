<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStudyProgramToCollegeStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('college_students', function (Blueprint $table) {
            $table->unsignedBigInteger('study_program_id');
            $table->foreign('study_program_id')->references('id')->on('study_programs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('college_students', function (Blueprint $table) {
            //
        });
    }
}
