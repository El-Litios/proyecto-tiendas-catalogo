<?php

namespace App\Controllers\Cliente;
use CodeIgniter\Controller;


class Ventas extends Controller
{
    public function listar(){
        $model = model('Ventas_Modelo');
        $data['ventas'] = $model->ListaVentaCliente(session()->id_cliente);
        echo View('VistaCliente/Templates/Header');
        echo View('VistaCliente/Ventas/ListaVentas', $data);
        echo View('VistaCliente/Templates/Footer');
    } 

}