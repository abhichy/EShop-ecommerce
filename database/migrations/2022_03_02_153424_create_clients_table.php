<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('password');
            $table->string('full_name');
            $table->string('first_name', 255)->nullable();
            $table->string('last_name', 255)->nullable();
            $table->string('email')->unique('email');
            $table->string('varify_token', 255)->nullable();
            $table->boolean('status')->default(false);
            $table->string('contact_no');
            $table->integer('nid')->nullable();
            $table->string('present_address', 255)->nullable();
            $table->string('permanent_address', 255)->nullable();
            $table->tinyInteger('activity')->default(1);
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
        Schema::dropIfExists('clients');
    }
}
