<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Presupuesto extends Authenticatable
{
    use Notifiable;
    protected $table= 'PRESUPUESTOS'; //tabla de la base de datos
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
            return \DB::table('LISTARPRESUPUESTOS');
        } catch (Exception $e) {
            return 0;
        }
    }

    public static function ListarRecibos(){
        try {
            return \DB::table('LISTARRECIBOS');
        } catch (Exception $e) {
            return 0;
        }
    }

    public static function Obtener($id){
        try {
            return \DB::table('LISTARPRESUPUESTOS')->where("ID_PRESUPUESTO",$id);
        } catch (Exception $e) {
            return 0;
        }
    }
    public static function BuscarPart($mod){
        try {
            return \DB::table('V_PARTIDAS')->where("ID_MOD",$mod);
        } catch (Exception $e) {
            return 0;
        }
    }
    public static function BuscarCliente($ced,$nac,$id){
        try {
            if (isset($id)) {
                return \DB::table('V_CLIENTES')->where("ID_CLIENTE",$id);
            }else{
                if ($nac=="-1") {
                    return \DB::table('V_CLIENTES')->where("RIF",$ced);
                }else{
                    return \DB::table('V_CLIENTES')->where("ID_TIPO_DOC",$nac)->where("DOC_IDENTIFICACION",$ced);
                }
            }
            
        } catch (Exception $e) {
            return 0;
        }
    }
    public static function ejecutar($consulta){
        try{
            return \DB::select($consulta);
            //return \DB::statement(\DB::raw($everything));
        }catch( \Exeption $e){
            return 0;
        }
    }
    public static function ListarPartidasPresupuesto($id){
        try {
            return \DB::table('V_PARTIDAS_PRESUPUESTO')->where("ID_PRESUPUESTO",$id);
        } catch (Exception $e) {
            return 0;
        }
    }
    public static function ListarHonorariosPresupuesto($id){
        try {
            return \DB::table('v_honorarios_presupuesto')->where("ID_PRESUPUESTO",$id);
        } catch (Exception $e) {
            return 0;
        }
    }

    public static function ListarPagosRecibos($id){
        try {
            return \DB::table('LISTARRECIBOS')->where("ID_PRE",$id);
        } catch (Exception $e) {
            return 0;
        }
    }

    public static function EliminarPartida($id_partida,$id_pre){
        try {
            return \DB::table('DETALLE_PRESUPUESTO')->where('ID_PART', $id_partida)->where('ID_PPTO', $id_pre)->delete();
        } catch (Exception $e) {
            return 0;
        }
       
    }

    public static function insertRecibo($data){
        try {
            return \DB::table('RECIBOS_PAGO')->insert($data);
        } catch (Exception $e) {
            return 0;
        }
    }
    public static function buscarIdRecibo($id){
         try {
            return \DB::table('RECIBOS_PAGO')->where("ID_PRE",$id);
        } catch (Exception $e) {
            return 0;
        }
    }
    public static function obtenerRecibo($id){
         try {
            return \DB::table('listarrecibos')->where("ID_RECIBO",$id);
        } catch (Exception $e) {
            return 0;
        }
    }
    public static function actualizarEstado($status,$id){
        try {
            return \DB::table('PRESUPUESTOS')->where('ID_PRESUPUESTO', $id)->update($status);
        } catch (Exception $e) {
            return 0;
        }
       
    }

    /*public static function modificar($data,$id){
        try {
            return \DB::table('EMPRESA')->where('ID_EMPRESA', $id)->update($data);
        } catch (Exception $e) {
            return 0;
        }
    }*/

    /*public static function status($data,$id){
        try {
            return \DB::table('USERS')->where('ID', $id)->update($data);
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
