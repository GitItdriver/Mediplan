<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ocupacion extends Model{

    protected $table = 'partidas';
	public $timestamps = false;

public static function todo(){ // Función consultar todos los paises
        try{
            return \DB::table('partidas')->where("ID_MODULO",4)->select("id_partida", "nombre_partida");
        }catch( \Exeption $e){
            return 0;
        }
}

    
}