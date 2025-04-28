<?php

namespace App\Models\admin;

use CodeIgniter\Model;

class DepartemenModel extends Model
{
    protected $table = 'departemen';
    protected $primaryKey = 'id_departemen';
    protected $allowedFields = ['id_departemen', 'nama_departemen'];
}
