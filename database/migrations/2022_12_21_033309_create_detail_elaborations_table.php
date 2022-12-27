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
        Schema::create('detail_elaborations', function (Blueprint $table) {
            $table->id();
            $table->float('quantity');
            $table->foreignId('elaboration_id')->constrained('elaborations');
            $table->foreignId('supply_id')->constrained('supplies');
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
        Schema::dropIfExists('detail_elaborations');
    }
};
