<?php

namespace App\Controllers;

use App\Models\admin\DepartemenModel;

class Departemen extends BaseController
{
    protected $departemenModel;

    public function __construct()
    {
        $this->departemenModel = new DepartemenModel();
    }

    public function index()
    {
        $data['departemen'] = $this->departemenModel->findAll();

        echo view('temp/header');
        echo view('temp/navbar');
        echo view('admin/tabel_departemen', $data);
    }

    public function add_data_departemen()
    {
        echo view('admin/add_data_departemen');
    }

    public function proses_add_departemen()
    {
        $data = [
            'id_departemen' => $this->request->getPost('id_departemen'),
            'nama_departemen' => $this->request->getPost('nama_departemen'),
        ];

        if ($this->departemenModel->insert($data)) {
            return redirect()->to('/departemen')->with('success', 'Data departemen berhasil ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan data departemen');
        }
    }

    public function edit($id)
    {
        $data = [
            'id_departemen' => $this->request->getPost('id_departemen'),
            'nama_departemen' => $this->request->getPost('nama_departemen'),
        ];

        $updated = $this->departemenModel->where('id_departemen', $id)->set($data)->update();

        if ($updated) {
            return redirect()->to('/departemen')->with('success', 'Data departemen berhasil diedit');
        }

        return redirect()->back()->with('error', 'Gagal mengedit data departemen');
    }

    public function delete($id)
    {
        if ($this->departemenModel->delete($id)) {
            return redirect()->to('/departemen')->with('success', 'Data departemen berhasil dihapus');
        }

        return redirect()->to('/departemen')->with('error', 'Gagal menghapus data departemen');
    }

    public function departemen()
    {
        echo view('temp/header');
        echo view('temp/navbar');
        echo view('admin/departemen');
    }
}
