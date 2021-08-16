<?php
namespace App\Models;

use CodeIgniter\Model;

class MetodoPago_Modelo extends Model{
    protected $table = 'MetodoPago';
    protected $primarykey = 'id';
    protected $allowedFields = ['desc'];

    public function ListaMetodoPago(){
        return $this->findAll();
    }
}