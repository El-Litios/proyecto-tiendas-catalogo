<?php
namespace App\Models;

use CodeIgniter\Model;

class Ventas_Modelo extends Model{

    protected $table = 'Ventas';
    protected $primarykey = 'id';
    protected $allowedFields = ['fecha','idestado','idmetodo','idtienda','idcliente',];

    //lista de ventas segun el ID del cliente
    public function ListaVentaCliente($id){
        return $this
        ->table('ventas')
        ->select('ventas.id, ventas.fecha, estadoventa.desc as `estado_venta`, metodopago.desc, tiendas.nombre')
        ->join('estadoventa','ventas.idestado = estadoventa.id','INNER')
        ->join('metodopago','ventas.idmetodo = metodopago.id','INNER')
        ->join('tiendas','ventas.idtienda = tiendas.id','INNER')
        ->where('idcliente', $id)
        ->findAll();
    } 

    public function MostrarDatos($id){
        return $this
        ->table('ventas')
        ->select('ventas.id, ventas.fecha, estadoventa.desc as `estado_venta`, metodopago.desc, tiendas.nombre')
        ->join('estadoventa','ventas.idestado = estadoventa.id','INNER')
        ->join('metodopago','ventas.idmetodo = metodopago.id','INNER')
        ->join('tiendas','ventas.idtienda = tiendas.id','INNER')
        ->where('ventas.id', $id)
        ->findAll();
    }


    //listar para gestion del vendedor
    public function ListaVentaVendedor($id){
        return $this
        ->table('ventas')
        ->select(
            'ventas.id, 
            ventas.fecha, 
            estadoventa.desc as `estado_venta`, 
            metodopago.desc as `pago_desc`, 
            clientes.rut as `cliente_rut`, 
            clientes.nombre as `cliente_nombre`,
            tiendas.idusu as `tiendaid_usu`,
            tiendas.id as `tienda_id`,
            tiendas.nombre as `tienda_nombre`
        ')
        ->join('estadoventa','ventas.idestado = estadoventa.id','INNER')
        ->join('metodopago','ventas.idmetodo = metodopago.id','INNER')
        ->join('clientes','ventas.idcliente = clientes.id','INNER')
        ->join('tiendas','ventas.idtienda = tiendas.id','INNER')
        ->where('tiendas.idusu', $id)
        ->findAll();
    }

    public function ListaEditar($idusu, $idventa){
        return $this
        ->table('ventas')
        ->select(
            'ventas.id, 
            ventas.fecha, 
            estadoventa.desc as `estado_venta`, 
            metodopago.desc as `pago_desc`, 
            clientes.rut as `cliente_rut`, 
            clientes.nombre as `cliente_nombre`,
            tiendas.nombre as `tienda_nombre`
        ')
        ->join('estadoventa','ventas.idestado = estadoventa.id','INNER')
        ->join('metodopago','ventas.idmetodo = metodopago.id','INNER')
        ->join('clientes','ventas.idcliente = clientes.id','INNER')
        ->join('tiendas','ventas.idtienda = tiendas.id','INNER')
        ->where('tiendas.idusu', $idusu)
        ->Where('ventas.id', $idventa)
        ->first();
    }
    
}