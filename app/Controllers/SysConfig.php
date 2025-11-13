<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SysConfigModel;
use CodeIgniter\HTTP\ResponseInterface;

class SysConfig extends BaseController
{
    public function index()
    {
        //
    }

    public function profile_sistem()
    {
        $sysConfig = $this->sysConfigModel->findAll();

        $data = [
            'user' => $this->user,
            'gambar_desa' => $this->sysConfigModel->where('key', 'gambar_desa')->first(),
            'sejarah_desa' => $this->sysConfigModel->where('key', 'sejarah_desa')->first(),
            'visi' => $this->sysConfigModel->where('key', 'visi')->first(),
            'misi' => $this->sysConfigModel->where('key', 'misi')->first(),
            'gambar_ilustrasi' => $this->sysConfigModel->where('key', 'gambar_ilustrasi')->first(),
            'judul_sambutan' => $this->sysConfigModel->where('key', 'judul_sambutan')->first(),
            'subjudul_sambutan' => $this->sysConfigModel->where('key', 'subjudul_sambutan')->first(),
            'siteLogo' => $this->getSiteLogo(),
            'siteName' => $this->getSiteName(),
            'halamanIni' => $this->getHalamanIni($this->currentUrl),
            'sidebarMenu' => $this->menuModel->where('role', $this->user['role'])->where('is_active', 1)->findAll(),
        ];
        return view('pages/admin/profil_sistem/form_tambah', $data);
    }

    public function profile_update()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'sejarah' => 'permit_empty',
            'visi' => 'permit_empty',
            'misi' => 'permit_empty',
            'gambar_desa' => [
                'rules' => 'max_size[gambar_desa,2048]|is_image[gambar_desa]|mime_in[gambar_desa,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar. Maksimal 2MB.',
                    'is_image' => 'File yang diupload harus berupa gambar.',
                    'mime_in' => 'Format gambar harus JPG, JPEG, atau PNG.'
                ]
            ]
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        try {
            // Handle file upload untuk gambar desa
            $gambarDesa = $this->request->getFile('gambar_desa');
            if ($gambarDesa && $gambarDesa->isValid() && !$gambarDesa->hasMoved()) {
                // Hapus gambar lama jika ada
                $oldImage = $this->sysConfigModel->where('key', 'gambar_desa')->first();
                if ($oldImage && $oldImage['value'] && file_exists(FCPATH . $oldImage['value'])) {
                    unlink(FCPATH . $oldImage['value']);
                }

                // Generate nama file unik
                $newName = $gambarDesa->getRandomName();
                $uploadPath = FCPATH . 'uploads/desa/';

                // Pastikan folder uploads/desa exists
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }

                // Pindahkan file
                $gambarDesa->move($uploadPath, $newName);

                // Update database
                $this->sysConfigModel->set('value', 'uploads/desa/' . $newName)
                    ->set('updated_at', date('Y-m-d H:i:s'))
                    ->where('key', 'gambar_desa')
                    ->update();
            }

            // Update sejarah desa
            $sejarah = $this->request->getPost('sejarah');
            if ($sejarah !== null) {
                $this->sysConfigModel->set('value', $sejarah)
                    ->set('updated_at', date('Y-m-d H:i:s'))
                    ->where('key', 'sejarah_desa')
                    ->update();
            }

            // Update visi
            $visi = $this->request->getPost('visi');
            if ($visi !== null) {
                $this->sysConfigModel->set('value', $visi)
                    ->set('updated_at', date('Y-m-d H:i:s'))
                    ->where('key', 'visi')
                    ->update();
            }

            // Update misi
            $misi = $this->request->getPost('misi');
            if ($misi !== null) {
                $this->sysConfigModel->set('value', $misi)
                    ->set('updated_at', date('Y-m-d H:i:s'))
                    ->where('key', 'misi')
                    ->update();
            }

            return redirect()->back()->with('success', 'Data desa berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function updateWelcomePage()
    {
        // Handle file upload
        $gambar = $this->request->getFile('ilustrasi_desa');
        if ($gambar && $gambar->isValid()) {
            $newName = $gambar->getRandomName();
            $gambar->move('uploads/desa', $newName);

            // Update gambar in database
            $this->sysConfigModel->where('key', 'gambar_ilustrasi')->set('value', 'uploads/desa/' . $newName)->update();
        }

        // Update text fields
        $this->sysConfigModel->where('key', 'judul_sambutan')->set('value', $this->request->getPost('judul_sambutan'))->update();
        $this->sysConfigModel->where('key', 'subjudul_sambutan')->set('value', $this->request->getPost('subjudul_sambutan'))->update();

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
}
