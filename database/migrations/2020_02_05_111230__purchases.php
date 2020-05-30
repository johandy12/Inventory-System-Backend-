<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Purchases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('salesNo');
            $table->string('sellerName');
            $table->string('paymentType');
            $table->double('totalPrice');
            $table->integer('tax')->default('0');
            $table->integer('shipment')->default('0');
            $table->string('description')->default('');
            $table->date('transactionDate');
            $table->string('status');
            $table->rememberToken();
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
    }
}
