<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$modelo = model('Producto_Modelo');
		$data['producto'] = $modelo->ListaPrincipal();
		echo View('Templates/Header');
		echo View('Principal', $data);
		echo View('Templates/Footer');
	}

	public function loginc(){
		echo View('Templates/Header');
		echo View('Auth/LoginCliente');
		echo View('Templates/Footer');
	}

	public function loginva(){
		echo View('Templates/Header');
		echo View('Auth/LoginVendedorAdm');
		echo View('Templates/Footer');
	}

	public function registroc(){
        echo View('Templates/Header');
        echo View('Auth/RegistroCliente');
        echo View('Templates/Footer');
    }
}
