<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrdersAndItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reference')->nullable();
            $table->integer('contact_id')->unsigned()->nullable();
            $table->foreign('contact_id')
                ->references('id')
                ->on('contacts');

            $table->timestamps();
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name');
            $table->integer('price');

            $table->timestamps();
        });

        Schema::create('order_order_item', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('order_id');
            $table->unsignedInteger('order_item_id');

            $table->foreign('order_id')
                    ->references('id')
                    ->on('orders');
            
            $table->foreign('order_item_id')
                    ->references('id')
                    ->on('order_items');
            
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

        Schema::table('order_order_item', function (Blueprint $table) {
            $table->dropForeign('order_order_item_order_id_foreign');
            $table->dropForeign('order_order_item_order_item_id_foreign');
        });

        Schema::drop('orders');
        Schema::drop('order_items');
        Schema::drop('order_order_item');
    }
}
