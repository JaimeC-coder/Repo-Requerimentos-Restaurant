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
        Schema::create('elaborations', function (Blueprint $table) {
            $table->id();
            $table->integer('cuantity');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('employee_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('employee_id')->references('id')->on('employees');

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
        Schema::dropIfExists('elaborations');
    }
};
