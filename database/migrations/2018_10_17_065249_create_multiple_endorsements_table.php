<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMultipleEndorsementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('multiple_endorsements', function (Blueprint $table) {
            $table->increments('id');
            $table->applicant_id();
            $table->contact_person();
            $table->endorsement1();
            $table->endorsement2();
            $table->endorsement3();
            $table->site1();
            $table->site2();
            $table->site3();
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
        Schema::dropIfExists('multiple_endorsements');
    }
}
