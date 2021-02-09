<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorAuthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendor_auths', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('vendor_name');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('location');
            $table->string('email_verification')->nullable();
            $table->tinyInteger('activity')->default(0);
            $table->integer('nid');
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
        Schema::dropIfExists('vendor_auths');
    }
}
