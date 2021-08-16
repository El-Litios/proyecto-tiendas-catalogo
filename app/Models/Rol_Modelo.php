<?php
namespace App\Models;

use CodeIgniter\Model;

class Rol_Modelo extends Model{

    protected $table = 'Rol';
    protected $primarykey = 'id';
    protected $allowedFields = ['desc'];
}