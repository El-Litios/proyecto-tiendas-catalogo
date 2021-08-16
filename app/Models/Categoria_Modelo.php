<?php
namespace App\Models;

use CodeIgniter\Model;

class Categoria_Modelo extends Model{

    protected $table = 'Categoria';
    protected $primarykey = 'id';
    protected $allowedFields = ['desc'];
}