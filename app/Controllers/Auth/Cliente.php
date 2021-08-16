<?php

namespace App\Controllers\Auth;
use CodeIgniter\Controller;


class Cliente extends Controller
{
    public  function index(){
        echo View('VistaCliente/Templates/Header');
        echo View('VistaCliente/Principal');
        echo View('VistaCliente/Templates/Footer');
    }

    //iniciar sesion
    public function login(){
        $model = model('Cliente_Modelo');
        $request = service('request');
        $validation = service('validation');
        $validation->setRules([
            'alias' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debe ingresar su nombre de usuario'
                ]
            ],
            'pass' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debe ingresar una contraseña'
                ]
            ]
        ]);

        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        
        
        $alias = trim($request->getVar('alias'));
        $pass = trim($request->getVar('pass'));
        if(!$user = $model->getCliente('alias', $alias)){ //la variable $user toma la funcion del modelo y la almacena 
            return redirect()->back()->with('msg', [
                'body' => 'Las credenciales ingresadas no existen en el sistema :('
            ]);
        }

        if(!$model->getPass('pass', $pass)){ // aca se usa $user para encontrar la pass ya encriptada desde la bd por el metodo del model.
            return redirect()->back()->with('msg', [
                'body' => 'Las pass ingresadas no existen en el sistema :('
            ]);
        }


        session()->set([
            'id_cliente' => $user['id'],
            'nombre' => $user['nombre'],
            'alias' => $user['alias'],
            'is_logged' => true,
        ]);

        return redirect()->route('clientedash');
        
    }

    //Cerrar sesion
    public function logout(){
        session()->destroy();
        return redirect()->to(base_url('/'));
    }

    //guardar registro
    public function store(){
        $model = model('Cliente_Modelo');
        $request = service('request');
        $validation = service('validation');
        $validation->setRules([
            'rut' => [
                'rules' => 'required|is_unique[clientes.rut]',
                'errors' => [
                    'required' => 'Debe ingresar su rut',
                    'is_unique' => 'Rut existente'
                ]
            ],
            'alias' => [
                'rules' => 'required|is_unique[clientes.alias]',
                'errors' => [
                    'required' => 'Debe ingresar su nombre de usuario',
                    'is_unique' => 'Usuario existente'
                ]
            ],
            'pass' => [
                'rules' => 'required|matches[pass_conf]',
                'errors' => [
                    'required' => 'Debe ingresar una contraseña',
                    'matches' => 'Las contraseñas deben coincidir'
                ]
            ],
            'nombre' => [
                'rules' => 'required|min_length[10]',
                'errors' => [
                    'required' => 'Debe ingresar su nombre completo',
                    'min_length' => 'Debe ingresar su nombre completo'
                ]
            ],
            'correo' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Debe ingresar su correo electrónico',
                    'valid_email' => 'Debe ingresar un correo valido'
                ]
            ],
            'telefono' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debe ingresar su teléfono'
                ]
            ]
        ]);

        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'rut' => $request->getVar('rut'),
            'alias' => $request->getVar('alias'),
            'pass' => $request->getVar('pass'),
            'nombre' => $request->getVar('nombre'),
            'correo' => $request->getVar('correo'),
            'telefono' => $request->getVar('telefono'),
        ];

        $model->save($data);

        return redirect()->route('loginc')->with('msg', [
            'body' => 'Registo exitoso.'
        ]);
    }
}