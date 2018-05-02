<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paises extends Model{

    protected $table = 'paises';
	public $timestamps = false;

public static function todo(){ // Función consultar todos los paises
        try{
            return \DB::table('paises')->select("id", "nombre");
        }catch( \Exeption $e){
            return 0;
        }
}

    
}