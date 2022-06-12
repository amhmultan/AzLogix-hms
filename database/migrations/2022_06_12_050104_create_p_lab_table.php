<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePLabTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('p_lab', function (Blueprint $table) {
            $table->id();
            $table->string('p_lab_name');
            $table->binary('p_lab_pic')->nullable();
            $table->string('p_lab_address');
            $table->string('p_lab_contact');
            $table->string('p_lab_email');
            $table->string('p_lab_remarks');
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
        Schema::dropIfExists('p_lab');
    }
}
