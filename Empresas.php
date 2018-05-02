<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Empresas extends Authenticatable
{
    use Notifiable;
    protected $table= 'EMPRESA'; //tabla de la base de datos
    public $timestamps= false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'apellido', 'email', 'password', 'nivel', 'status', 'created_at', 'updated_at', 'remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public static function Listar(){
        try {
            return \DB::table('V_EMPRESA');
        } catch (Exception $e) {
            return 0;
        }
    }
    public static function ListarActivas($status){
        try {
            return \DB::table('EMPRESA')->where("STATUS",$status);
        } catch (Exception $e) {
            return 0;
        }
    }

    public static function Obtener($id){
        try {
            return \DB::table('EMPRESA')->where("ID_EMPRESA",$id);
        } catch (Exception $e) {
            return 0;
        }
    }

    public static function insert($data){
        try {
            return \DB::table('EMPRESA')->insert($data);
        } catch (Exception $e) {
            return 0;
        }
    }

    public static function modificar($data,$id){
        try {
            return \DB::table('EMPRESA')->where('ID_EMPRESA', $id)->update($data);
        } catch (Exception $e) {
            return 0;
        }
    }

    public static function status($data,$id){
        try {
            return \DB::table('USERS')->where('ID', $id)->update($data);
        } catch (Exception $e) {
            return 0;
        }
       
    }
    public static function todo(){ // Función consultar todos los paises
        try{
            $nivel= Auth::user()->nivel;
            if ($nivel==1) {
               return \DB::table('EMPRESA')->where("status",1)->select("id_empresa", "razon_social");
            }else{
                $empresa= Auth::user()->empresa;
                return \DB::table('EMPRESA')->where("status",1)->where("id_empresa",$empresa)->select("id_empresa", "razon_social");
            }
        }catch( \Exeption $e){
            return 0;
        }
    }

    

    /*public static function Modificar($data,$id){
        try {
            return \DB::table('USERS')->where('ID', $id)->update($data);
        } catch (Exception $e) {
            return 0;
        }
        
    }*/
}
