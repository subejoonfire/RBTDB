<?php

namespace App\Controllers;

use App\Models\admin\KaryawanModel;
use CodeIgniter\HTTP\RequestInterface;

class Karyawan2 extends BaseController
{
    public $karyawanModel;
    public function __construct()
    {
        $this->karyawanModel = new KaryawanModel();
    }
    public function index()
    {
        $karyawanModel = new KaryawanModel();
        $data['karyawan'] = $karyawanModel->findAll();

        echo view('temp/header');
        echo view('temp/navbar');
        echo view('admin/tabel_karyawan', $data);
    }

    public function add_data_karyawan()
    {
        echo view('admin/add_data_karyawan');
    }

    public function proses_add_karyawan()
    {
        $karyawanModel = new KaryawanModel();

        $data = [
            'sn' => $this->request->getPost('sn'),
            'nama' => $this->request->getPost('nama'),
            'nik' => $this->request->getPost('nik'),
            'status' => $this->request->getPost('status'),
            'no_hp' => $this->request->getPost('no_hp'),
            'no_hp_darurat' => $this->request->getPost('no_hp_darurat'),
            'doh' => $this->request->getPost('doh'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'usia' => $this->request->getPost('usia')
        ];
        $karyawanModel->insert($data);

        return redirect()->to('/karyawan')->with('success', 'Data karyawan berhasil ditambahkan');
    }
    public function edit($id)
    {
        $data = [
            'sn' => $this->request->getPost('sn'),
            'nama' => $this->request->getPost('nama'),
            'nik' => $this->request->getPost('nik'),
            'status' => $this->request->getPost('status'),
            'no_hp' => $this->request->getPost('no_hp'),
            'no_hp_darurat' => $this->request->getPost('no_hp_darurat'),
            'doh' => $this->request->getPost('doh'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'usia' => $this->request->getPost('usia')
        ];
        $query = $this->karyawanModel->where('id_karyawan', $id)->set($data)->update();
        if ($query) {
            return redirect()->to(base_url('karyawan'))->with('success', 'Berhasil mengedit data karyawan');
        }
        return redirect()->back()->with('error', 'Gagal mengedit data karyawan');
    }
    public function delete($id)
    {
        $query = $this->karyawanModel->delete($id);
        if ($query) {
            return redirect()->back();
        }
        return redirect()->back();
    }
    public function karyawan()
    {
        echo view('temp/header');
        echo view('temp/navbar');
        echo view('admin/karyawan');
    }
}
