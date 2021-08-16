<?php
namespace App\Models;

use CodeIgniter\Model;

class Tiendas_Modelo extends Model{

    protected $table = 'Tiendas';
    protected $primarykey = 'id';
    protected $allowedFields = ['nombre','foto','idusu'];

    public function ListaTiendas(){
        return $this
        ->table('Tiendas')
        ->select('tiendas.id, tiendas.nombre, tiendas.foto, usuario.nombre as `usunom`')
        ->join('usuario', 'tiendas.idusu = usuario.id', 'INNER')
        ->findAll();
    }

    public function ListaTiendasVendedor($id){
        return $this
        ->table('Tiendas')
        ->select('tiendas.id, tiendas.nombre, tiendas.foto')
        ->Where('idusu', $id)
        ->findAll();
    }

    public function TiendaId($id){
        return $this
        ->table('Tiendas')
        ->select('tiendas.id')
        ->Where('id', $id)
        ->First();
    }

    public function TiendasPorVendedor($id){
        return $this->table('Tiendas')
        ->select('tiendas.id, tiendas.nombre')
        ->Where('idusu', $id)
        ->findAll();
    }
}