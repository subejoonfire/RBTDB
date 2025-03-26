<?php

namespace App\Models\admin;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table = 'karyawan';
    protected $primaryKey = 'id_karyawan';
    protected $allowedFields = ['sn', 'nama', 'nik','status', 'no_hp', 'no_hp_darurat', 'doh', 'tanggal_lahir', 'usia'];
}
