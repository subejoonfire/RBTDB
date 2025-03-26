<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\admin\KaryawanModel;

class Karyawan extends Controller
{
    public $karyawanModel;
    public function __construct()
    {
        $this->karyawanModel = new KaryawanModel();
    }
    public function index()
    {
        return view('karyawan/dashboard');
    }
    public function edit($id)
    {
        $data = [
            'data' => $this->karyawanModel->find($id),
        ];
        return view('karyawan/edit', $data);
    }
    public function detail($id)
    {
        $data = [
            'data' => $this->karyawanModel->find($id),
        ];
        return view('karyawan/detail', $data);
    }
}
