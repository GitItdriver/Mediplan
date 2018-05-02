<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Honorarios extends Model{

    protected $table = 'honorarios';
	public $timestamps = false;

public static function todo(){ // Función consultar todos los paises
        try{
            return \DB::table('honorarios')->select("id_honorario", "nombre_honorario");
        }catch( \Exeption $e){
            return 0;
        }
}

    
}