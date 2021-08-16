<?php
namespace App\Models;

use CodeIgniter\Model;

class EstadoVenta_Modelo extends Model{

    protected $table = 'EstadoVenta';
    protected $primarykey = 'id';
    protected $allowedFields = ['desc'];
}