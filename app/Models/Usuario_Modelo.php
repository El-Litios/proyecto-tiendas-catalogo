<?php
namespace App\Models;

use CodeIgniter\Model;

class Usuario_Modelo extends Model{

    protected $table = 'Usuario';
    protected $primarykey = 'id';
    protected $allowedFields = ['alias','pass','nombre','telefono','correo', 'idrol'];

    //funcion LOGIN para encontrar al usuario
    public function getUsuario(string $column, string $value){
        return $this->where($column, $value)->first();
    }

    public function getPass(string $column, string $value){
        return $this->Where($column, $value)->first();
    }

    //Gestion de usuarios
    public function ListadoUsuarios(){
        return $this
        ->table('Usuario')
        ->select('usuario.id, usuario.alias, usuario.nombre, usuario.telefono, usuario.correo, rol.desc')
        ->join('rol', 'usuario.idrol = rol.id', 'INNER')
        ->Where('idrol', 2)
        ->findAll();
    }

    //Gestion de tiendas
    public function ListaVendedor()
    {
        return $this
        ->table('Usuario')
        ->select('usuario.id, usuario.nombre')
        ->Where('idrol', 2)
        ->findAll();
    }
}