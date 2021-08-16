<?php

namespace App\Controllers;
use CodeIgniter\Controller;


class Tiendas extends Controller
{
    public function index(){
        $modeloT = model('Tiendas_Modelo');
        $modeloV = model('Usuario_Modelo');
        $data['tiendas'] = $modeloT->ListaTiendas();
        $data['vendedor'] = $modeloV->ListaVendedor();
        echo View('VistaUsuario/Templates/Header');
        echo View('VistaUsuario/Tiendas/ListaTiendas', $data);
        echo View('VistaUsuario/Tiendas/ModalAgregar');
        echo View('VistaUsuario/Templates/Footer');
    }

    public function store(){
        $modelo = model('Tiendas_Modelo');
        $request = service('request');
        $validation = service('validation');
        $validation->setRules([
            'nombre' => [
                'rules' => 'required|alpha_space|max_length[30]',
                'errors' => [
                    'required' => 'Debe ingresar el nombre de la tienda',
                    'alpha_space' => 'Debe contener caracteres alfabeticos',
                    'max_length' => 'Maximo 15 caracteres',
                ]
            ],
            'vendedor' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debe ingresar un vendedor'
                ]
            ],
            'archivo' => [
                'rules' => 'uploaded[archivo]|is_image[archivo]',
                'errors' => [
                    'uploaded' => 'Debe subir una foto',
                    'is_image' => 'Debe ser una imagen'
                ]
            ]
        ]);

        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $archivo = $request->getFile('archivo');
        $data = [
            'nombre' => $request->getVar('nombre'),
            'foto' => $archivo->getName(),
            'idusu' => $request->getVar('vendedor')
        ];
        $archivo->move('./public/img/Tiendas');
        $modelo->insert($data);
        return redirect()->route('usuario/tienda-lista')->with('msg', [
            'body' => 'Tienda creada exitosamente.'
        ]);
    }

    public function formedit($id){
        $modelo = model('Tiendas_Modelo');
        $data['tiendas'] = $modelo->Where('id', $id)->First();
        echo View('VistaUsuario/Templates/Header');
        echo View('VistaUsuario/Tiendas/EditarTiendas', $data);
        echo View('VistaUsuario/Templates/Footer');
    }

    public function edit(){
        $modelo = model('Tiendas_Modelo');
        $request = service('request');
        $archivo = $request->getFile('archivo');
        $validation = service('validation');
        
        $validation->setRules([
            'archivo' => [
                'rules' => 'is_image[archivo]',
                'errors' => [
                    'is_image' => 'Debe ser una imagen'
                ]
            ]
        ]);
        if($archivo != ''){
            $img_actual = $request->getVar('imgactual');
            $url = FCPATH . 'public\img\Tiendas\\'.$img_actual;
            unlink($url);

            $modelo->save([
                'id' => $request->getVar('id'),
                'nombre' => $request->getVar('nombre'),
                'foto' => $archivo->getName()
            ]);
            $archivo->move('./public/img/Tiendas'); 
        } else{
            $modelo->save([
                'id' => $request->getVar('id'),
                'nombre' => $request->getVar('nombre'),
            ]);
        }

        
        
        return redirect()->route('usuario/tienda-lista')->with('msg', [
            'body' => 'Tienda editada exitosamente.'
        ]);  
    }

    public function delete($id, $img)
    {
        $modelo = model('Tiendas_Modelo');
        $modelo->where('id', $id)->delete();
        $url = FCPATH . 'public\img\Tiendas\\'.$img;
        unlink($url);
        return redirect()->route('usuario/tienda-lista')->with('msg', [
            'body' => 'Tienda eliminada exitosamente.'
        ]);
    }

    //Vendedor

    public function listatiendavendedor($id){
        $modelo = model('Tiendas_Modelo');
        $data['Tiendas'] = $modelo->ListaTiendasVendedor($id); 
        echo View('VistaUsuario/Templates/Header');
        echo View('VistaVendedor/Tiendas/ListaTiendas', $data);
        echo View('VistaUsuario/Templates/Footer');
    }
}
