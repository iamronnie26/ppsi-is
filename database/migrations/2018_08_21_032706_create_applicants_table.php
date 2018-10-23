<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('applicants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('series_no')->default(0);
            $table->string('firstname')->default("");
            $table->string('middlename')->default("");
            $table->string('lastname')->default("");
            $table->string('contact_no')->default("");
            $table->date('birthdate')->nullable();
            $table->string('position_applying')->default("");
            $table->integer('contact_id')->default(0);
            $table->string('contact_experience')->default("");
            $table->string('educational_attainment')->default("");
            $table->integer('last_year_attended')->default(0);
            $table->string('work_status')->default("");
            $table->string('activity')->default("");
            $table->integer('business_partner')->default(0);
            $table->string('site_endorsed')->default("");
            $table->string('endorse')->default("");
            $table->string('email')->default("");
            $table->string('address')->default("");
            $table->string('nationality')->default("");
            $table->string('gender')->default("");
            $table->string('marital_status')->default("");
            $table->string('course')->default("");
            $table->integer('school_id')->default(0);
            $table->integer('year_graduated')->default(0);
            $table->string('comment')->default("");
            $table->string('remarks')->default("");
            $table->string('interviewStatus')->default("");
            $table->integer('interviewer_id')->default(0);
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
        //
        Schema::dropIfExists('applicants');
    }
}
