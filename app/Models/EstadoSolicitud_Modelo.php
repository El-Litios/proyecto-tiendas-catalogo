<?php
namespace App\Models;

use CodeIgniter\Model;

class EstadoSolicitud_Modelo extends Model{

    protected $table = 'EstadoSolicitud';
    protected $primarykey = 'id';
    protected $allowedFields = ['desc'];

    public function ListaEstado(){
        return $this->findAll();
    }

}




