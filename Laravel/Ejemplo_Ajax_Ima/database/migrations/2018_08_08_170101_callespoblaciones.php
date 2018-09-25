<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Callespoblaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('callespoblaciones',function (Blueprint $table){
            $table->increments('idCalle');
            $table->string('CodPoblacion',50);
            $table->string('nombre',50);
            $table->string('CodPostal',50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('callespoblaciones');
    }
}
