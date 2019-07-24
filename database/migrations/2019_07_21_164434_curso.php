<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Curso extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('curso', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('descripcion');
            $table->bigInteger('materiaid')->unsigned();
            $table->foreign('materiaid')->references('id')->on('materia')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curso');
    }
}
