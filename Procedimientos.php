<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procedimientos extends Model{

    protected $table = 'dominio';
	public $timestamps = false;

public static function todo(){ // Función consultar todos los paises
        try{
            return \DB::table('dominio')->where("tipo","plan")->select("id", "dominio");
        }catch( \Exeption $e){
            return 0;
        }
}

    
}