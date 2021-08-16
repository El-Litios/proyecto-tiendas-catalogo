<?php

namespace App\Controllers;
use CodeIgniter\Controller;


class Ventas extends Controller
{
    public function verDetalle($i){
        $modelDetail = model('DetalleVenta_Modelo');
        $modelVenta = model('Ventas_Modelo');
        $data['venta'] = $modelVenta->MostrarDatos($i);
        $data['detalle'] = $modelDetail->DetalleVenta($i);
        echo View('VistaCliente/Templates/Header');
        echo View('VistaCliente/Ventas/Detalle', $data);
        echo View('VistaCliente/Templates/Footer'); 
    }

    public function index(){
        $modeloV = model('Ventas_Modelo');
        $modeloT = model('Tiendas_Modelo');
        $modeloM = model('MetodoPago_Modelo');
        $modeloC = model('Cliente_Modelo');
        $data['Ventas'] = $modeloV->ListaVentaVendedor(session()->id_usuario);
        $dataform['Metodos'] = $modeloM->findAll();
        $dataform['Tiendas'] = $modeloT->TiendasPorVendedor(session()->id_usuario);
        $dataform['Clientes'] = $modeloC->ListaCliente();
        echo View('VistaUsuario/Templates/Header');
        echo View('VistaVendedor/Ventas/ModalAgregar', $dataform);
        echo View('VistaVendedor/Ventas/ListaVentas', $data);
        echo View('VistaUsuario/Templates/Footer');
    }

    public function store(){
        $modelo = model('Ventas_Modelo');
        $request = service('request');
        $validation = service('validation');
        $validation->setRules([
            'fecha' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debe ingresar la fecha de la venta'
                ]
            ],
            'tienda' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debe ingresar una tienda'
                ]
            ],
            'metodo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debe ingresar un método de pago'
                ]
            ],
            'cliente' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debe ingresar un método de pago'
                ]
            ]
        ]);

        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'fecha' => $request->getVar('fecha'),
            'idtienda' => $request->getVar('tienda'),
            'idmetodo' => $request->getVar('metodo'),
            'idcliente' => $request->getVar('cliente'),
            'idestado' => 3
        ];

        $modelo->save($data);
        return redirect()->to(base_url('vendedor/lista-venta'))->with('msg', [
            'body' => 'Venta añadida exitosamente.'
        ]);
    }

    public function formedit($id){
        $modeloV = model('Ventas_Modelo');
        $modeloE = model('EstadoVenta_Modelo');
        $data['Ventas'] = $modeloV->ListaEditar(session()->id_usuario, $id);
        $data['Estados'] = $modeloE->findAll();
        echo View('VistaUsuario/Templates/Header');
        echo View('VistaVendedor/Ventas/EditarVentas', $data);
        echo View('VistaUsuario/Templates/Footer');
    }

    public function edit(){
        $modelo = model('Ventas_Modelo');
        $request = service('request');
        $id = $request->getVar('id');
        $validation = service('validation');
        $validation->setRules([
            'estado' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debe seleccionar un estado'
                ]
            ]
        ]);
        
        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'idestado' => $request->getVar('estado')
        ];

        $modelo->update($id, $data);
        
        return redirect()->to(base_url('vendedor/lista-venta'))->with('msg', [
            'body' => 'Venta editada exitosamente.'
        ]);
    }

    public function delete($id){
        $modelo = model('Ventas_Modelo');
        $modelo->where('id', $id)->delete();
        return redirect()->to(base_url('vendedor/lista-venta'))->with('msg', [
            'body' => 'Venta eliminada exitosamente.'
        ]);
    }

    public function listadetalle($idventa, $idtienda){
        $modelDetail = model('DetalleVenta_Modelo');
        $modelVenta = model('Ventas_Modelo');
        $modelProducto = model('Producto_Modelo');
        $data['Venta'] = $modelVenta->MostrarDatos($idventa);
        $data['Detalle'] = $modelDetail->DetalleVenta($idventa);
        $dataform['Productos'] = $modelProducto->ProductosVenta($idtienda);
        $dataform['Venta'] = $modelVenta->Where('id', $idventa)->first();
        echo View('VistaUsuario/Templates/Header');
        echo View('VistaVendedor/Ventas/DetalleVenta', $data);
        echo View('VistaVendedor/Ventas/ModalProductoDetalle', $dataform);
        echo View('VistaUsuario/Templates/Footer');
    }

    public function storedetail(){
        $modelo = model('DetalleVenta_Modelo');
        $request = service('request');
        $idventa = $request->getVar('idventa');
        $idtienda = $request->getVar('idtienda');
        $validation = service('validation');
        $validation->setRules([
            'producto' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debe seleccionar un producto'
                ]
            ],
            'cantidad' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debe ingresar la cantidad'
                ]
            ]
        ]);
        
        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'idproducto' => $request->getVar('producto'),
            'idventa' => $idventa,
            'cantidad' => $request->getVar('cantidad')
        ];

        $modelo->save($data);

        return redirect()->to(base_url('vendedor/detalleventa-listar/').'/'.$idventa.'/'.$idtienda)->with('msg', [
            'body' => 'Producto agregado al detalle.'
        ]);
    }
}