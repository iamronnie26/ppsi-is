<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterviewInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interview_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('applicant_id');
            $table->integer('interviewer_id')->unsigned();
            $table->string('contact_experience')->default("");
            $table->string('activity')->default("");
            $table->integer('partner_id')->default(0);
            $table->integer('endorse_to_site_id')->default(0);
            $table->string('comment')->default("");
            $table->string('remarks')->default("");
            $table->string('status')->default("");
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
        Schema::dropIfExists('interview_infos');
    }
}
