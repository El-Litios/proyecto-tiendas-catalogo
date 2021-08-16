<?php
namespace App\Models;

use CodeIgniter\Model;

class DetalleVenta_Modelo extends Model{

    protected $table = 'DetalleVenta';
    protected $primarykey = 'id';
    protected $allowedFields = ['cantidad','idproducto','idventa'];

    //detalle de venta
    public function DetalleVenta($id){
        return $this
        ->table('detalleventa')
        ->select(
            'detalleventa.id, 
            detalleventa.cantidad, 
            producto.nombre as `nombre_producto`,
            producto.precio as `precio_producto`,
            producto.id as `id_producto`'
        )
        ->join('producto','detalleventa.idproducto = producto.id','INNER')
        ->where('idventa', $id)
        ->findAll();
    }
}