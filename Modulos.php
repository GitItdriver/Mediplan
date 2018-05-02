<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulos extends Model{

    protected $table = 'tipo_usuarios';
	public $timestamps = false;

public static function todo(){ // Función consultar todos los paises
        try{
            return \DB::table('modulos')->select("id_mod", "nombre_mod");
        }catch( \Exeption $e){
            return 0;
        }
}

    
}