<?php

namespace Ejemplo\Models\Poblacion;

use Illuminate\Database\Eloquent\Model;

class CallesPoblaciones extends Model
{
    //
    protected $table= 'callespoblaciones';
   protected $primarykey = 'idCalle';
   public $timestamps = false;
   protected  $fillable= [
		'idCalle', 'CodPoblacion', 'nombre', 'CodPostal'
   ];
}

/*
 public function up()
    {
        Schema::create('poblacion',function (Blueprint $table){
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
   /* public function down()
    {
        Schema::drop('poblacion');
    }*/
