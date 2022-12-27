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
        Schema::create('employees', function (Blueprint $table) {//empleados
            $table->id();
            $table->string('DNI')->unique();//estado
            $table->string('phone');//numero de telefono
            $table->string('address');//direccion
            $table->string('city');//ciudad
            $table->unsignedBigInteger('user_id');//id del usuario
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); //relacion con la tabla users
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
        Schema::dropIfExists('employees');
    }
};
