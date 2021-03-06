<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Proveedores extends Authenticatable
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
            return \DB::table('V_PROVEEDORES');
        } catch (Exception $e) {
            return 0;
        }
    }

    public static function Obtener($id){
        try {
            return \DB::table('PROVEEDORES_INTERNOS')->where("ID_PROVEEDOR",$id);
        } catch (Exception $e) {
            return 0;
        }
    }

    public static function insert($data){
        try {
            return \DB::table('PROVEEDORES_INTERNOS')->insert($data);
        } catch (Exception $e) {
            return 0;
        }
    }

    public static function modificar($data,$id){
        try {
            return \DB::table('PROVEEDORES_INTERNOS')->where('ID_PROVEEDOR', $id)->update($data);
        } catch (Exception $e) {
            return 0;
        }
    }

    public static function status($data,$id){
        try {
            return \DB::table('PROVEEDORES_INTERNOS')->where('ID_PROVEEDOR', $id)->update($data);
        } catch (Exception $e) {
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
