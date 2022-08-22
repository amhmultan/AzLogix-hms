<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('fname');
            $table->string('dob');
            $table->string('gender');
            $table->string('marital_status');
            $table->string('phone');
            $table->string('email');
            $table->string('cnic');
            $table->string('address');
            $table->string('emr_name');
            $table->string('relationship');
            $table->string('emr_phone');
            $table->string('weight');
            $table->string('height');
            $table->string('history');
            $table->string('reffered_by');
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
        Schema::dropIfExists('patients');
    }
}
