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
            $table->unsignedInteger('client_id');
            $table->string('sub_total', 255);
            $table->float('discount', 10, 0);
            $table->string('total_cost', 255);
            $table->string('address');
            $table->string('phone_number', 255);
            $table->string('alphonenumber', 255)->nullable();
            $table->tinyInteger('status')->default(1)->comment('1 = pending; 2=processing; 3=cancelled;4=delivered');
            $table->tinyInteger('delivered')->nullable()->default(0)->comment('no=0 ; yes=1');
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
