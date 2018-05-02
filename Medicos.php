<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicos extends Model{

    protected $table = 'proveedores_internos';
	public $timestamps = false;

public static function todo(){ // Función consultar todos los paises
        try{
            //return \DB::table('proveedores_internos')->where("OCUPACION",6)->select("id_proveedor", "nombre_proveedor");
            return \DB::table('proveedores_internos')->select("id_proveedor", "nombre_proveedor");
        }catch( \Exeption $e){
            return 0;
        }
}

    
}