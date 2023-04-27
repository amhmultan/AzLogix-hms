<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tokens', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('fk_patients_id');
            $table->unsignedBigInteger('fk_doctors_id');
            $table->unsignedBigInteger('fk_specialty_id');
            $table->integer('fees')->unsigned();
            $table->integer('denomination')->unsigned();
            $table->integer('balance')->unsigned();
            $table->timestamps();

            $table->foreign('fk_patients_id')->on('patients')->references('id') 
            ->onDelete('CASCADE')
            ->onUpdate('CASCADE');
            
            $table->foreign('fk_doctors_id')->on('doctors')->references('id')
            ->onDelete('CASCADE')
            ->onUpdate('CASCADE');
            
            $table->foreign('fk_specialty_id')->on('specialities')->references('id')
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
        Schema::dropIfExists('tokens');
    }
}
