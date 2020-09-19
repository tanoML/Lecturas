<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ResponsablesCarreras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsables_carreras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_responsable');
            $table->foreign('id_responsable')->references('id')->on('users');
            $table->unsignedBigInteger('id_carrera');
            $table->foreign('id_carrera')->references('id')->on('institutes');
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
        Schema::dropIfExists('responsables_carreras');
    }
}
