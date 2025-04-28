<?php

namespace App\Models\admin;

use CodeIgniter\Model;

class JabatanModel extends Model
{
    protected $table = 'jabatan';
    protected $primaryKey = 'id_jabatan';
    protected $allowedFields = ['id_jabatan', 'nama_jabatan'];
}
