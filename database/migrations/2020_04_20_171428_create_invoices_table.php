<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('order_id');
            $table->bigInteger('product_id');
            $table->integer('product_quantity');
            $table->bigInteger('vendor_id');
            $table->float('product_unite_price', 10, 0);
            $table->float('unit_x_quantity_price', 10, 0)->nullable();
            $table->string('invoice_type', 30)->nullable();
            $table->boolean('to_delivery')->nullable()->comment('delivery status	');
            $table->date('date')->nullable();
            $table->integer('status')->default(1);
            $table->integer('trash')->default(0);
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
        Schema::dropIfExists('invoices');
    }
}
