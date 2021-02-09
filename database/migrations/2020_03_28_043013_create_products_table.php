<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('category_id')->unsigned();
            $table->integer('subcategory_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->integer('brand_id')->unsigned();
            $table->integer('vendor_id')->unsigned();
            $table->string('product_name');
            $table->text('product_description');
            $table->integer('product_price');
            $table->string('sell_unit');
            $table->integer('product_quantity');
            $table->string('discount');
            $table->string('currency');
            $table->string('product_image');
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
        Schema::dropIfExists('products');
    }
}
