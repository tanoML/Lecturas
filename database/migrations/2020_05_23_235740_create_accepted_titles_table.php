<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcceptedTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accepted_titles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('author');
            $table->bigInteger('nroPage');
            $table->bigInteger('score');
            $table->boolean('library');
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
        Schema::dropIfExists('accepted_titles');
    }
}
