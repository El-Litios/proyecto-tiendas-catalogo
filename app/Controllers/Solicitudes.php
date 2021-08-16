<?php

namespace App\Controllers;
use CodeIgniter\Controller;


class Solicitudes extends Controller
{
    public function rechazar($id){
        $modelo = model('Solicitudes_Modelo');
        $data=[
            'idestado' => 1
        ];
        $modelo->update($id,$data); 
        return redirect()->route('usuario/lista-solicitud');
    }

    public function aprobar($id){
        $modelo = model('Solicitudes_Modelo');
        $data=[
            'idestado' => 3
        ];
        $modelo->update($id,$data); 
        return redirect()->route('usuario/lista-solicitud');
    }
}