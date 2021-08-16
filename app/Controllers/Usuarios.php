<?php

namespace App\Controllers;
use CodeIgniter\Controller;


class Usuarios extends Controller
{
    public function index(){
        $modelo = model('Usuario_Modelo');
        $data['usuario'] = $modelo->ListadoUsuarios();
        echo View('VistaUsuario/Templates/Header');
        echo View('VistaUsuario/Usuarios/ListaUsuarios', $data);
        echo View('VistaUsuario/Usuarios/ModalAgregar');
        echo View('VistaUsuario/Templates/Footer');
    }

    public function store(){
        $modelo = model('Usuario_Modelo');
        $request = service('request');
        $validation = service('validation');
        $validation->setRules([
            'alias' => [
                'rules' => 'required|min_length[8]|is_unique[usuario.alias]',
                'errors' => [
                    'required' => 'Debe ingresar un nombre de usuario',
                    'min_length' => 'Debe contener al menos 8 caracteres',
                    'is_unique' => 'Usuario existente',
                ]
            ],
            'pass' => [
                'rules' => 'required|min_length[7]',
                'errors' => [
                    'required' => 'Debe ingresar una contraseña',
                    'min_length' => 'Debe ser mínimo de 7 caracteres',
                ]
            ],
            'nombre' => [
                'rules' => 'required|min_length[15]',
                'errors' => [
                    'required' => 'Debe ingresar el nombre',
                    'min_length' => 'Debe ingresar el nombre completo'
                ]
            ],
            'telefono' => [
                'rules' => 'required|min_length[12]',
                'errors' => [
                    'required' => 'Debe ingresar un teléfono',
                    'min_length' => 'Debe ingresar un numero válido'
                ]
            ],
            'correo' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Debe ingresar un correo',
                    'valid_email' => 'Debe ingresar un correo válido'
                ]
            ],

        ]);
        
        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'alias' => $request->getVar('alias'),
            'pass' => $request->getVar('pass'),
            'nombre' => $request->getVar('nombre'),
            'telefono' => $request->getVar('telefono'),
            'correo' => $request->getVar('correo'),
            'idrol' => 2
        ];

        $modelo->save($data);

        return redirect()->route('usuario/usuario-lista')->with('msg', [
            'body' => 'Usuario ingresado exitosamente.'
        ]);
    }

    public function formedit($id){
        $modeloU = model('Usuario_Modelo');
        $modeloR = model('Rol_Modelo');
        $data['usuario'] = $modeloU->Where('id', $id)->first();
        $data['rol'] = $modeloR->findAll();
        echo View('VistaUsuario/Templates/Header');
        echo View('VistaUsuario/Usuarios/EditarUsuarios', $data);
        echo View('VistaUsuario/Templates/Footer');
    }

    public function edit(){
        $modelo = model('Usuario_Modelo');
        $request = service('request');
        $id = $request->getVar('id');
        $validation = service('validation');
        $validation->setRules([
            'alias' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Debe ingresar un nombre de usuario',
                    'min_length' => 'Debe contener al menos 8 caracteres',
                ]
            ],
            'nombre' => [
                'rules' => 'required|min_length[15]',
                'errors' => [
                    'required' => 'Debe ingresar el nombre',
                    'min_length' => 'Debe ingresar el nombre completo'
                ]
            ],
            'telefono' => [
                'rules' => 'required|min_length[12]',
                'errors' => [
                    'required' => 'Debe ingresar un teléfono',
                    'min_length' => 'Debe ingresar un numero válido'
                ]
            ],
            'correo' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Debe ingresar un correo',
                    'valid_email' => 'Debe ingresar un correo válido'
                ]
            ],
            'rol' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debe seleccionar un rol'
                ]
            ]
        ]);
        
        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'alias' => $request->getVar('alias'),
            'nombre' => $request->getVar('nombre'),
            'telefono' => $request->getVar('telefono'),
            'correo' => $request->getVar('correo'),
            'idrol' => $request->getVar('rol')
        ];

        $modelo->update($id, $data);
        
        return redirect()->route('usuario/usuario-lista')->with('msg', [
            'body' => 'Usuario editado exitosamente.'
        ]);
        
    }

    public function delete($id){
        $modelo = model('Usuario_Modelo');
        $modelo->where('id', $id)->delete();
        return redirect()->route('usuario/usuario-lista')->with('msg', [
            'body' => 'Usuario eliminado exitosamente.'
        ]);
    }
}