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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('app_name');
            $table->string('app_link');
            $table->string('app_description');
            $table->string('timezone');
            $table->string('duration');
            $table->boolean('book_multiple_times');
            $table->enum('required_detail', ['email', 'phone', 'both']);
            $table->integer('payment_amount');
            $table->enum('payment_mode', ['stripe', 'paypal']);
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
        Schema::dropIfExists('appointments');
    }
};
