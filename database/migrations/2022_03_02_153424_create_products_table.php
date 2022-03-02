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
            $table->unsignedInteger('category_id')->nullable();
            $table->unsignedInteger('subcategory_id')->nullable();
            $table->unsignedInteger('type_id');
            $table->unsignedInteger('brand_id')->nullable();
            $table->unsignedInteger('vendor_id');
            $table->string('product_name');
            $table->text('product_description');
            $table->text('product_specification')->nullable();
            $table->integer('product_price');
            $table->string('model_number', 255)->nullable();
            $table->string('sell_unit');
            $table->integer('product_quantity');
            $table->string('discount')->nullable();
            $table->integer('discount_percent');
            $table->string('currency');
            $table->string('product_image');
            $table->integer('popularity')->default(0);
            $table->tinyInteger('status')->default(1)->comment('active = 1 and inactive = 2');
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
