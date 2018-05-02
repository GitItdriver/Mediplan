<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipoProveedor extends Model{

    protected $table = 'tipo_proveedores';
	public $timestamps = false;

public static function todo(){ // Función consultar todos los paises
        try{
            return \DB::table('tipo_proveedores')->select("id", "nombre");
        }catch( \Exeption $e){
            return 0;
        }
}

    
}