<?php
namespace App\Models;

use CodeIgniter\Model;

class Cliente_Modelo extends Model{

    protected $table = 'Clientes';
    protected $primarykey = 'id';
    protected $allowedFields = ['alias','rut','pass','nombre','correo','telefono'];


    //funcion LOGIN para encontrar al usuario
    public function getCliente(string $column, string $value){
        return $this->where($column, $value)->first();
    }

    public function getPass(string $column, string $value){
        return $this->Where($column, $value)->first();
    }

    public function ListaCliente(){
        return $this
        ->table('clientes')
        ->select(
            'clientes.id, clientes.rut, clientes.nombre'
        )
        ->findAll();
    }
}