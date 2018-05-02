<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipoUser extends Model{

    protected $table = 'tipo_usuarios';
	public $timestamps = false;

public static function todo(){ // Función consultar todos los paises
        try{
            return \DB::table('tipo_usuarios')->select("id_tipo_usuario", "nombre_tipo_usuario");
        }catch( \Exeption $e){
            return 0;
        }
}

    
}