<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_number');
            $table->string('item');
            $table->integer('quantity');
            $table->string('price');
            $table->integer('total');
            $table->integer('company_id')->unsigned()
                ->references('id')
                ->on('companies');

            $table->integer('contact_id')->unsigned();
            $table->foreign('contact_id')
                ->references('id')
                ->on('contacts');
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
        Schema::dropIfExists('orders');
    }
}
