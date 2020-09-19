<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTstudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tstudents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_student')->unsigned();
            $table->foreign('id_student')->references('id')->on('users');
            $table->string('matricula');
            $table->bigInteger('id_responsable');
            $table->bigInteger('id_semestre');
            $table->char('sexo');
            $table->bigInteger('id_periodo'); //REVISRA DESPUES SI ES NECESARIO HACER LAS LLAVES FORANEAS
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
        Schema::dropIfExists('tstudents');
    }
}
