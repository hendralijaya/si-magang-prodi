<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClassYearToCollegeStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('college_students', function (Blueprint $table) {
            $table->unsignedBigInteger('class_year_id');
            $table->foreign('class_year_id')->references('id')->on('class_years');
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
