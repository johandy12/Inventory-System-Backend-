<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PurchaseInvoice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchaseInvoice', function(Blueprint $table) {
            $table->increments('id');
            // $table->integer('type_id')->unsigned();
            // $table->integer('brand_id')->unsigned();
            $table->integer('salesNo');
            $table->string('itemName');
            $table->string('quantity')->default('0');
            $table->string('price')->default('0');
            $table->rememberToken();
            $table->timestamps();
            
            //Foreign
            // $table->foreign('type_id')
            // ->references('id')->on('Type')
            // ->onDelete('cascade');
                
            // $table->foreign('brand_id')
            // ->references('id')->on('Brand')
            // ->onDelete('cascade');
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
