<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTransectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_transections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('invoice_no',50);
            $table->date ('date');
            $table->integer('vendor_id');
            $table->decimal('total_value', $precision = 50, $scale = 2);
            $table->integer('discount',50);
            $table->text('remarks');
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
        Schema::dropIfExists('product_transections');
    }
}
