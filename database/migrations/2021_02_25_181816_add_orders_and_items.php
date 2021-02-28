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

        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('product_name');
            $table->integer('price');

            $table->timestamps();
        });

        Schema::create('item_order', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('order_id');
            $table->unsignedInteger('item_id');

            $table->foreign('order_id')
                    ->references('id')
                    ->on('orders');
            
            $table->foreign('item_id')
                    ->references('id')
                    ->on('items');
            
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

        Schema::table('item_order', function (Blueprint $table) {
            $table->dropForeign('item_order_order_id_foreign');
            $table->dropForeign('item_order_item_id_foreign');
        });

        Schema::drop('orders');
        Schema::drop('items');
        Schema::drop('item_order');
    }
}
