<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class implantes extends Model{

    protected $table = 'dominio';
	public $timestamps = false;

public static function todo(){ // Función consultar todos los paises
        try{
            return \DB::table('dominio')->where("tipo","implantes")->select("id", "dominio");
        }catch( \Exeption $e){
            return 0;
        }
}

    
}