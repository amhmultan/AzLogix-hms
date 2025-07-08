<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->binary('pic')->nullable();
            $table->string('name');
            $table->string('contact')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('address')->nullable();
            $table->string('dob')->nullable();
            $table->unsignedBigInteger('speciality_id');
            $table->string('schedule')->nullable();
            $table->string('cnic')->nullable();
            $table->string('pmdc');
            $table->string('remarks')->nullable();
            $table->timestamps();

            $table->foreign('speciality_id')->on('specialities')->references('id')
            ->onDelete('CASCADE')
            ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
