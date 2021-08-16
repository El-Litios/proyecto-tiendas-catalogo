<?php

namespace App\Controllers\Auth;
use CodeIgniter\Controller;


class Vendedor_Adm extends Controller
{
    public function index(){
        echo View('VistaUsuario/Templates/Header');
        echo View('VistaUsuario/Principal');
        echo View('VistaUsuario/Templates/Footer');
    }
    //iniciar sesion
    public function login(){
        $model = model('Usuario_Modelo');
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
        if(!$user = $model->getUsuario('alias', $alias)){ //la variable $user toma la funcion del modelo y la almacena 
            return redirect()->back()->with('msg', [
                'body' => 'Las credenciales ingresadas no existen en el sistema :('
            ]);
        }

        if(!$model->getPass('pass', $pass)){ // aca se usa $user para encontrar la pass ya encriptada desde la bd por el metodo del model.
            return redirect()->back()->with('msg', [
                'body' => 'Las credenciales ingresadas no existen en el sistema :('
            ]);
        }


        session()->set([
            'id_usuario' => $user['id'],
            'nombre' => $user['nombre'],
            'alias' => $user['alias'],
            'rol' => $user['idrol'],
            'is_logged' => true,
        ]);

        return redirect()->route('dashboard');
        
    }

    //Cerrar sesion
    public function logout(){
        session()->destroy();
        return redirect()->to(base_url('/'));
    }

}