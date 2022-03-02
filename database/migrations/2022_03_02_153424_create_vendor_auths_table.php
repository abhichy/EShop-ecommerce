<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
            $table->string('vendor_name')->nullable();
            $table->string('password')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('location')->nullable();
            $table->string('email_verification')->nullable();
            $table->tinyInteger('activity')->default(0);
            $table->integer('nid')->nullable();
            $table->string('photo', 100)->nullable();
            $table->timestamps();
        });
        DB::table('vendor_auths')->insert([
            [
                'vendor_name' => 'Vendor',
                'email' => 'vendor@gmail.com',
                'password' => Hash::make('vendor123'),
            ]
        ]);
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
