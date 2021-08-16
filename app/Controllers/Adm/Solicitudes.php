<?php

namespace App\Controllers\Adm;
use CodeIgniter\Controller;


class Solicitudes extends Controller
{

    public function index(){
        $modeloS = model('Solicitudes_Modelo');
        $modeloE = model('EstadoSolicitud_Modelo');
        $data['solicitud'] = $modeloS->ListaSolicitudes();
        $data['estados'] = $modeloE->ListaEstado();
        echo View('VistaUsuario/Templates/Header');
        echo View('VistaUsuario/Solicitudes/ListaSolicitudes', $data);
        echo View('VistaUsuario/Templates/Footer');
    }

    public function filtrar(){
        $modelo = model('Solicitudes_Modelo');
        $modeloE = model('EstadoSolicitud_Modelo');
        $request = service('request');
        $id = $request->getVar('estado');
        $param = $request->getVar('busqueda');
        $data['solicitud'] = $modelo->FiltroSolicitud($param, $id);
        $data['estados'] = $modeloE->ListaEstado();
        echo View('VistaUsuario/Templates/Header');
        echo View('VistaUsuario/Solicitudes/ListaSolicitudes', $data);
        echo View('VistaUsuario/Templates/Footer');   
    }

    

}