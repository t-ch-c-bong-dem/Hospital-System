<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('appointment_id');
            $table->string('invoice_number');
            $table->decimal('amount', 10, 2);
            $table->timestamp('payment_timestamp');
            $table->enum('payment_status', ['confirmed', 'pending', 'canceled', 'completed']);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('appointment_id')->references('id')->on('appointments');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
