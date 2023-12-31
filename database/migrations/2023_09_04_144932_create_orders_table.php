<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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

            $table->string('name', 64);
            $table->string('last_name', 64);
            $table->string('address', 255);
            $table->string('email', 255)->unique();
            $table->string('mobile_phone')->unique();
            $table->dateTime('date_time');
            $table->float('total_amount', 10, 2);
            $table->boolean('order_status');

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
};
