<?php

namespace App\Controllers;

use App\Models\admin\JabatanModel;

class Jabatan extends BaseController
{
    protected $jabatanModel;

    public function __construct()
    {
        $this->jabatanModel = new JabatanModel();
    }

    public function index()
    {
        $data['jabatan'] = $this->jabatanModel->findAll();

        echo view('temp/header');
        echo view('temp/navbar');
        echo view('admin/tabel_jabatan', $data);
    }

    public function add_data_jabatan()
    {
        echo view('admin/add_data_jabatan');
    }

    public function proses_add_jabatan()
    {
        $data = [
            'id_jabatan' => $this->request->getPost('id_jabatan'),
            'nama_jabatan' => $this->request->getPost('nama_jabatan'),
        ];

        if ($this->jabatanModel->insert($data)) {
            return redirect()->to('/jabatan')->with('success', 'Data jabatan berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan data jabatan');
        }
    }

    public function edit($id)
    {
        $data = [
            'id_jabatan' => $this->request->getPost('id_jabatan'),
            'nama_jabatan' => $this->request->getPost('nama_jabatan'),
        ];

        $updated = $this->jabatanModel->where('id_jabatan', $id)->set($data)->update();

        if ($updated) {
            return redirect()->to('/jabatan')->with('success', 'Data jabatan berhasil diedit');
        }

        return redirect()->back()->with('error', 'Gagal mengedit data jabatan');
    }

    public function delete($id)
    {
        if ($this->jabatanModel->delete($id)) {
            return redirect()->to('/jabatan')->with('success', 'Data jabatan berhasil dihapus');
        }

        return redirect()->to('/jabatan')->with('error', 'Gagal menghapus data jabatan');
    }

    public function jabatan()
    {
        echo view('temp/header');
        echo view('temp/navbar');
        echo view('admin/jabatan');
    }
}
