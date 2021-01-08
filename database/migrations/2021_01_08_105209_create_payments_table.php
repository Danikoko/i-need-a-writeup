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
            $table->string('payment_ref');
            $table->bigInteger('client_id')->unsigned();
            $table->bigInteger('worker_id')->unsigned();
            $table->decimal('amount_paid', 20, 2);
            $table->date('expiry_date')->nullable();
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('users');
            $table->foreign('worker_id')->references('id')->on('workers');
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
