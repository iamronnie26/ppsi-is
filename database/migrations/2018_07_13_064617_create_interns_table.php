<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('contact_no');
            $table->string('course');
            $table->integer('ojt_hours');
            $table->integer('school_id')->unsigned();
            $table->integer('school_address')->unsigned();
            $table->integer('contact_id')->unsigned();
            $table->boolean('isActive')->default('true');
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
        Schema::dropIfExists('interns');
    }
}
