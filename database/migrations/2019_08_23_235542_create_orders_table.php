<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('services_id')->nullable();
            $table->foreign('services_id')->references('id')->on('services')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('transportation_id');
            $table->foreign('transportation_id')->references('id')->on('transportations')->onDelete('cascade')->onUpdate('cascade');
            $table->string('location_now');
            $table->string('location_target');
            $table->integer('adult_passenger')->nullable();
            $table->integer('children_passenger')->nullable();
            $table->enum('status', ['waiting', 'taken', 'cancel', 'success'])->default('waiting');
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
