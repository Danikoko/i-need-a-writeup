<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('service_id')->unsigned();
            $table->bigInteger('worker_id')->unsigned();
            $table->bigInteger('client_id')->unsigned();
            $table->boolean('completed')->comment('Incompleted is 0, Completed is 1')->default(0);
            $table->boolean('approved')->comment('Disapproved is 0, Approved is 1')->nullable();
            $table->date('start_date')->nullable()->comment('Date of work commence');
            $table->date('end_date')->nullable()->comment('Date of work completion');
            $table->timestamps();

            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('worker_id')->references('id')->on('workers');
            $table->foreign('client_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('works');
    }
}
