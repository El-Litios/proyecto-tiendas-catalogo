<?php

namespace App\Controllers;
use CodeIgniter\Controller;


class Productos extends Controller
{
    public function index($id){
        $modeloP = model('Producto_Modelo');
        $modeloT = model('Tiendas_Modelo');
        $modeloC = model('Categoria_Modelo');
        $data['Productos'] = $modeloP->ListaProductos($id);
        $data2['Tienda'] = $modeloT->TiendaId($id);
        $data2['Categoria'] = $modeloC->findAll();
        echo View('VistaUsuario/Templates/Header');
        echo View('VistaVendedor/Productos/ModalAgregar', $data2);
        echo View('VistaVendedor/Productos/ListaProductos', $data);
        echo View('VistaUsuario/Templates/Footer');
    }

    public function store(){
        $modelo = model('Producto_Modelo');
        $request = service('request');
        $validation = service('validation');
        $validation->setRules([
            'nombre' => [
                'rules' => 'required|max_length[20]',
                'errors' => [
                    'required' => 'Debe ingresar el nombre del producto',
                    'max_length' => 'Maximo 20 caracteres',
                ]
            ],
            'descripcion' => [
                'rules' => 'required|alpha_space|max_length[50]',
                'errors' => [
                    'required' => 'Debe ingresar la descripción del producto',
                    'alpha_space' => 'Debe contener caracteres alfabeticos',
                    'max_length' => 'Maximo 50 caracteres',
                ]
            ],
            'precio' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debe ingresar el precio del producto'
                ]
            ],
            'categoria' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debe ingresar la categoría'
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

        $tienda =  $request->getVar('tiendaid');
        $archivo = $request->getFile('archivo');
        $data = [
            'nombre' => $request->getVar('nombre'),
            'desc' => $request->getVar('descripcion'),
            'precio' => $request->getVar('precio'),
            'foto' => $archivo->getName(),
            'idtienda' => $tienda,
            'idcategoria' => $request->getVar('categoria')
        ]; 
        $archivo->move('./public/img/Productos');
        $modelo->insert($data); 
        return redirect()->to(base_url('vendedor/lista-producto').'/'.$tienda)->with('msg', [
            'body' => 'Producto añadido exitosamente.'
        ]);
        
    }

    public function formedit($id){
        $modeloP = model('Producto_Modelo');
        $modeloC = model('Categoria_Modelo');
        $data['Producto'] = $modeloP->Where('id', $id)->First();
        $data['Categoria'] = $modeloC->findAll();
        echo View('VistaUsuario/Templates/Header');
        echo View('VistaVendedor/Productos/EditarProductos', $data);
        echo View('VistaUsuario/Templates/Footer');
    }

    public function edit(){
        $modelo = model('Producto_Modelo');
        $request = service('request');
        $archivo = $request->getFile('archivo');
        $tienda =  $request->getVar('tiendaid');
        $validation = service('validation');
        $validation->setRules([
            'categoria' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debe ingresar la categoría'
                ]
            ],
        ]);

        if(!$validation->withRequest($this->request)->run()){
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }
        if($archivo != ''){
            $img_actual = $request->getVar('imgactual');
            $url = FCPATH . 'public\img\Productos\\'.$img_actual;
            unlink($url);

            $modelo->save([
                'id' => $request->getVar('id'),
                'nombre' => $request->getVar('nombre'),
                'desc' => $request->getVar('descripcion'),
                'precio' => $request->getVar('precio'),
                'foto' => $archivo->getName(),
                'idcategoria' => $request->getVar('categoria') 
            ]);
            $archivo->move('./public/img/Productos'); 
        } else{
            $modelo->save([
                'id' => $request->getVar('id'),
                'nombre' => $request->getVar('nombre'),
                'desc' => $request->getVar('descripcion'),
                'precio' => $request->getVar('precio'),
                'idcategoria' => $request->getVar('categoria')
            ]);
        }

        return redirect()->to(base_url('vendedor/lista-producto').'/'.$tienda)->with('msg', [
            'body' => 'Producto editado exitosamente.'
        ]);
    }

    public function delete($id, $img, $tienda){
        $modelo = model('Producto_Modelo');
        $modelo->where('id', $id)->delete();
        $url = FCPATH . 'public\img\Productos\\'.$img;
        unlink($url);
        return redirect()->to(base_url('vendedor/lista-producto').'/'.$tienda)->with('msg', [
            'body' => 'Producto editado exitosamente.'
        ]);
    }
}