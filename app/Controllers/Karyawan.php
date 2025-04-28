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
    public function getKaryawanById($id)
    {
        $model = new KaryawanModel();
        $karyawan = $model->find($id);

        if (!$karyawan) {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'Data karyawan tidak ditemukan']);
        }

        return $this->response->setJSON($karyawan); // Mengembalikan data dalam format JSON
    }
    public function updateSelectedKaryawan()
    {
        // 1. Ambil raw ID, bisa berupa array([0]=>"26,28") atau langsung string
        $rawIds = $this->request->getPost('id_karyawan');

        // 2. Jika array dengan index 0, ambil elemennya
        if (is_array($rawIds) && isset($rawIds[0])) {
            $rawIds = $rawIds[0];
        }

        // 3. Explode ke array of ints
        $ids = is_string($rawIds) ? explode(',', $rawIds) : (array)$rawIds;
        $ids = array_map('intval', $ids);

        // 4. Ambil semua postData
        $postData = $this->request->getPost();

        $errors = [];
        foreach ($ids as $id) {
            if (
                isset(
                    $postData['sn'][$id],
                    $postData['nama'][$id],
                    $postData['nik'][$id],
                    $postData['status'][$id],
                    $postData['no_hp'][$id],
                    $postData['no_hp_darurat'][$id],
                    $postData['doh'][$id],
                    $postData['tanggal_lahir'][$id],
                    $postData['usia'][$id]
                )
            ) {
                $data = [
                    'sn'               => $postData['sn'][$id],
                    'nama'             => $postData['nama'][$id],
                    'nik'              => $postData['nik'][$id],
                    'status'           => $postData['status'][$id],
                    'no_hp'            => $postData['no_hp'][$id],
                    'no_hp_darurat'    => $postData['no_hp_darurat'][$id],
                    'doh'              => $postData['doh'][$id],
                    'tanggal_lahir'    => $postData['tanggal_lahir'][$id],
                    'usia'             => $postData['usia'][$id],
                ];
                $this->karyawanModel->update($id, $data);
            } else {
                $errors[] = "Data tidak lengkap untuk ID $id";
            }
        }

        if (! empty($errors)) {
            return redirect()->back()
                ->with('error', implode('<br>', $errors))
                ->withInput();
        }

        return redirect()->to(base_url('karyawan'))
            ->with('message', 'Semua data karyawan berhasil diperbarui');
    }
}
