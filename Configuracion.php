<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Configuracion extends Authenticatable
{
    use Notifiable;
    protected $table= 'PROVEEDORES_INTERNOS'; //tabla de la base de datos
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
            return \DB::table('MODULOS');
        } catch (Exception $e) {
            return 0;
        }
    }

    public static function Obtener($id){
        try {
            return \DB::table('MODULOS')->where("ID_MOD",$id);
        } catch (Exception $e) {
            return 0;
        }
    }

    public static function ObtenerPartidas($id){
        try {
            return \DB::table('PARTIDAS')->where("ID_PARTIDA",$id);
        } catch (Exception $e) {
            return 0;
        }
    }

    public static function insert($data){
        try {
            return \DB::table('MODULOS')->insert($data);
        } catch (Exception $e) {
            return 0;
        }
    }

    public static function modificar($data,$id){
        try {
            return \DB::table('MODULOS')->where('ID_MOD', $id)->update($data);
        } catch (Exception $e) {
            return 0;
        }
    }

    public static function ListarPartidas(){
        try {
            return \DB::table('V_PARTIDAS_MODULOS');
        } catch (Exception $e) {
            return 0;
        }
    }

    public static function insertPartida($data){
        try {
            return \DB::table('PARTIDAS')->insert($data);
        } catch (Exception $e) {
            return 0;
        }
    }

    public static function modificarPartida($data,$id){
        try {
            return \DB::table('PARTIDAS')->where('ID_PARTIDA', $id)->update($data);
        } catch (Exception $e) {
            return 0;
        }
    }
    /*public static function status($data,$id){
        try {
            return \DB::table('PROVEEDORES_INTERNOS')->where('ID_PROVEEDOR', $id)->update($data);
        } catch (Exception $e) {
            return 0;
        }
       
    }*/

    

    /*public static function Modificar($data,$id){
        try {
            return \DB::table('USERS')->where('ID', $id)->update($data);
        } catch (Exception $e) {
            return 0;
        }
        
    }*/
}
