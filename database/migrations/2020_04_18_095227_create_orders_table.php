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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->integer('vendor_id')->unsigned()->nullable();
            $table->integer('client_id')->unsigned();
            $table->integer('product_id');
            $table->string('phone_number');
            $table->integer('post_code')->unsigned();
            $table->string('product_name');
            $table->integer('product_quantity');
            $table->string('product_price');
            $table->string('address');
            $table->tinyInteger('status')->default(1)->comment('1 = pending; 2=accepted; 3=cancelled');;
            $table->tinyInteger('delivered');
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
