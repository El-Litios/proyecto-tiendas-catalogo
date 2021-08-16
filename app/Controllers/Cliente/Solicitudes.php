<?php

namespace App\Controllers\Cliente;
use CodeIgniter\Controller;


class Solicitudes extends Controller
{
    public function index(){
        $model = model('Solicitudes_Modelo');
        $data['solicitud'] = $model->ListaSolictudCliente(session()->id_cliente);
        echo View('VistaCliente/Templates/Header');
        echo View('VistaCliente/Solicitudes/ListaSolicitudes', $data);
        echo View('VistaCliente/Solicitudes/ModalAgregar');
        echo View('VistaCliente/Templates/Footer');
    }

    public function filter(){
        $model = model('Solicitudes_Modelo');
        $request = service('request');
        $param = $request->getVar('busqueda');
        $data['solicitud'] = $model->ListaFiltrada(session()->id_cliente, $param);
        echo View('VistaCliente/Templates/Header');
        echo View('VistaCliente/Solicitudes/ListaSolicitudes', $data);
        echo View('VistaCliente/Solicitudes/ModalAgregar');
        echo View('VistaCliente/Templates/Footer');
    }

    public function store(){
        $model = model('Solicitudes_Modelo');
        $request = service('request');
        $validation = service('validation');
        $validation->setRules([
            'motivo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debe ingresar un motivo',
                ]
            ],
            'link' => [
                'rules' => 'required|valid_url',
                'errors' => [
                    'required' => 'Debe ingresar un link',
                    'valid_url' => 'Debe ser un link válido'
                ]
            ],
        ]);
        
        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'motivo' => $request->getVar('motivo'),
            'link' => $request->getVar('link'),
            'fecha' => date_create()->format('Y-m-d'),
            'idestado' => 2,
            'idcliente' => session()->id_cliente,
        ];

        $model->save($data);

        return redirect()->route('cliente/lista-solicitud')->with('msg', [
            'body' => 'Solicitud ingresada exitosamente.'
        ]);
    }
}