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
            $table->id();
            $table->foreignId('users_id');
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('no_hp');
            $table->string('alamat');
            $table->string('kota');
            $table->string('provinsi');
            $table->string('pincode');
            $table->string('total_harga');
            $table->tinyInteger('status')->default(0);
            $table->string('message')->nullable();
            $table->string('no_resi');
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
