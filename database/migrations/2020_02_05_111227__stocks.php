<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Stocks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->integer('brand_id')->unsigned();
            $table->string('itemName')->unique();
            $table->string('picture')->nullable();
            $table->integer('basePrice')->default('0');
            $table->integer('sellPrice')->default('0');
            $table->integer('quantity')->default('0');
            $table->string('size')->nullable();
            $table->integer('quantityMinimum')->default('0');
            //EXTRA
            $table->string('description')->default('')->nullable();
            $table->string('itemLocation')->default('')->nullable();
            $table->string('purchaseLocation')->default('')->nullable();
            $table->rememberToken();
            $table->timestamps();
            
            //Foreign
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('type_id')
                ->references('id')->on('Type')
                ->onDelete('cascade');
                
            $table->foreign('brand_id')
            ->references('id')->on('Brand')
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
