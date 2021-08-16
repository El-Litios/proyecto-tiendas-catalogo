<?php
namespace App\Models;

use CodeIgniter\Model;

class Solicitudes_Modelo extends Model{

    protected $table = 'Solicitud';
    protected $primarykey = 'id';
    protected $allowedFields = ['motivo','fecha','link','idestado','idcliente'];

    //lista para mostrar a clientes
    public function ListaSolictudCliente($id){
        return $this
        ->table('solicitud')
        ->select('solicitud.id, solicitud.motivo, solicitud.fecha, solicitud.link, estadosolicitud.desc')
        ->join('estadosolicitud','solicitud.idestado = estadosolicitud.id','INNER')
        ->where('idcliente', $id)
        ->findAll();
    }

    public function ListaFiltrada($id, $param){
        return $this
        ->table('solicitud')
        ->select('solicitud.id, solicitud.motivo, solicitud.fecha, solicitud.link, estadosolicitud.desc')
        ->join('estadosolicitud','solicitud.idestado = estadosolicitud.id','INNER')
        ->where('idcliente', $id)
        ->Like('estadosolicitud.desc', $param)
        ->findAll();
    }

    //lista de solicitudes para gestion
    public function ListaSolicitudes(){
        return $this
        ->table('solicitud')
        ->select('solicitud.id, solicitud.motivo, solicitud.fecha, solicitud.link, estadosolicitud.desc, clientes.rut, clientes.nombre')
        ->join('estadosolicitud','solicitud.idestado = estadosolicitud.id','INNER')
        ->join('clientes', 'solicitud.idcliente = clientes.id', 'INNER')
        ->Where('idestado', 2)
        ->findAll();
    }

    public function FiltroSolicitud($param, $estado){
        return $this
        ->table('solicitud')
        ->select('solicitud.id, solicitud.motivo, solicitud.fecha, solicitud.link, estadosolicitud.desc, clientes.rut, clientes.nombre')
        ->join('estadosolicitud','solicitud.idestado = estadosolicitud.id','INNER')
        ->join('clientes', 'solicitud.idcliente = clientes.id', 'INNER')
        ->Where('rut', $param)
        ->orWhere('idestado', $estado)
        ->findAll();
    }
}