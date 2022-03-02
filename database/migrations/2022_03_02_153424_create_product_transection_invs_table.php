<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTransectionInvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_transection_invs', function (Blueprint $table) {
            $table->integer('id', true);
            $table->unsignedInteger('product_transection_id');
            $table->unsignedInteger('product_id')->nullable();
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('discount');
            $table->integer('net');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_transection_invs');
    }
}
