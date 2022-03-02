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
            $table->bigInteger('client_id');
            $table->bigInteger('vendor_id');
            $table->bigInteger('product_id');
            $table->double('product_unit_price');
            $table->integer('product_quantity');
            $table->double('unit_x_quantity')->nullable();
            $table->double('invoice_discount');
            $table->double('invoice_after_discount')->nullable();
            $table->integer('status')->default(1)->comment('1=pending;2=processing;3=cancelled;4=adminAccept;5=delivered');
            $table->text('pdf')->nullable();
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
