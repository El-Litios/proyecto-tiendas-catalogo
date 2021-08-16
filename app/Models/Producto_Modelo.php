<?php
namespace App\Models;

use CodeIgniter\Model;

class Producto_Modelo extends Model{

    protected $table = 'Producto';
    protected $primarykey = 'id';
    protected $allowedFields = ['nombre','precio','desc','foto','idtienda','idcategoria'];

    public function ListaPrincipal(){
        return $this
        ->table('Producto')
        ->findAll();
    }

    public function ListaProductos($id){
        return $this
        ->table('Producto')
        ->select('producto.id, producto.nombre, producto.precio, producto.foto, producto.idtienda')
        ->Where('idtienda', $id)
        ->findAll();
    }

    public function ProductosVenta($id){
        return $this
        ->table('Producto')
        ->select('producto.id, producto.nombre')
        ->Where('idtienda', $id)
        ->findAll();
    }
}