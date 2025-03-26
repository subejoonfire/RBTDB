<?php

namespace App\Controllers;

use App\Models\admin\KaryawanModel;

class Home extends BaseController
{
    public $karyawanModel;
    public function __construct()
    {
        $this->karyawanModel = new KaryawanModel();
    }
    public function index()
    {
        $data = [
            'jumlahKaryawan' => $this->karyawanModel->countAll(),
        ];
        echo view('temp/header');
        echo view('temp/navbar');
        echo view('admin/dashboard', $data);
    }
}
