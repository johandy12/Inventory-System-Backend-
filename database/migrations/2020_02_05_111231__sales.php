<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('seller_id')->unsigned();
            $table->integer('salesNo')->unique();
            $table->string('customerName');
            $table->string('paymentType');
            $table->double('totalPrice');
            $table->integer('tax')->default('0');
            $table->integer('shipment')->default('0');
            $table->string('description')->default('');
            $table->date('transactionDate');
            $table->string('status');
            $table->rememberToken();
            $table->timestamps();
            
            //Foreign Users 
            $table->foreign('seller_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
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
