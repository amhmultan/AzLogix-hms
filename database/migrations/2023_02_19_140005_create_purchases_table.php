<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fk_product_id');
            $table->unsignedBigInteger('fk_manufacturer_id');
            $table->unsignedBigInteger('fk_supplier_id');
            $table->string('batch_no', 255);
            $table->integer('quantity');
            $table->double('trade_price', 8, 2);
            $table->double('retail_price', 8, 2);
            $table->integer('discount');
            $table->integer('tax');
            $table->double('net_amount', 8, 2);
            $table->double('gross_amount', 8, 2);
            $table->double('grand_amount', 8, 2);
            $table->string('remarks');
            $table->timestamps();

            $table->foreign('fk_product_id')->on('products')->references('id')
            ->onDelete('CASCADE')
            ->onUpdate('CASCADE');

            $table->foreign('fk_manufacturer_id')->on('manufacturers')->references('id')
            ->onDelete('CASCADE')
            ->onUpdate('CASCADE');
            
            $table->foreign('fk_supplier_id')->on('suppliers')->references('id')
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
        Schema::dropIfExists('purchases');
    }
}
