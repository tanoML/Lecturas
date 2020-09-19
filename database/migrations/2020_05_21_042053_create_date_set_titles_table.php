<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDateSetTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('date_set_titles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('dateStart');
            $table->date('dateEnd');
            $table->boolean('fullDate');
            $table->integer('parcial');
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
        Schema::dropIfExists('date_set_titles');
    }
}
