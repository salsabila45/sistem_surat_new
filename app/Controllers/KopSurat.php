<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\ResponseInterface;

class KopSurat extends BaseController
{
    public function edit($id = 1)
    {
        if ($id === null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $kop = $this->kopSuratModel->find($id);

        if (!$kop) {
            throw PageNotFoundException::forPageNotFound('Kop surat tidak ditemukan.');
        }

        $data = [
            'title' => 'Edit Kop Surat',
            'kopSurat'   => $kop,
            'validation' => \Config\Services::validation(),
            'user' => $this->user,
            'siteLogo' => $this->getSiteLogo(),
            'siteName' => $this->getSiteName(),
            'halamanIni' => $this->getHalamanIni($this->currentUrl),
            'sidebarMenu' => $this->menuModel->where('role', $this->user['role'])->where('is_active', 1)->findAll(),
        ];

        return view('pages/admin/kop_surat/form_edit', $data);
    }

    // Proses update
    public function update($id = null)
    {
        if ($id === null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $kop = $this->kopSuratModel->find($id);
        if (!$kop) {
            throw PageNotFoundException::forPageNotFound('Data tidak ditemukan.');
        }

        // Validasi input
        if (! $this->validate($this->kopSuratModel->validationRules)) {
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Upload logo jika ada file baru
        $file = $this->request->getFile('logo');
        $logoName = $kop['logo']; // default: gunakan logo lama

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $logoName = $this->kopSuratModel->uploadLogo($file, $kop['logo']);

            if (!$logoName) {
                return redirect()->back()->with('error', 'Gagal mengunggah logo.');
            }
        }

        // Data untuk disimpan
        $data = [
            'id'            => $id,
            'nama_instansi' => $this->request->getPost('nama_instansi'),
            'alamat'        => $this->request->getPost('alamat'),
            'desa'          => $this->request->getPost('desa'),
            'kecamatan'     => $this->request->getPost('kecamatan'),
            'kabupaten'     => $this->request->getPost('kabupaten'),
            'provinsi'      => $this->request->getPost('provinsi'),
            'kode_pos'      => $this->request->getPost('kode_pos'),
            'logo'          => $logoName,
        ];

        if ($this->kopSuratModel->save($data)) {
            return redirect()->to('/admin/kop-surat/')
                ->with('success', 'Kop surat berhasil diperbarui.');
        }

        return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data.');
    }

    // Hapus (soft delete)
    public function delete($id = null)
    {
        if ($id === null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $kop = $this->kopSuratModel->find($id);
        if (!$kop) {
            throw PageNotFoundException::forPageNotFound('Data tidak ditemukan.');
        }

        // Cek apakah ini kop aktif
        if ($kop->is_active == 1) {
            return redirect()->back()->with('error', 'Tidak dapat menghapus kop surat yang sedang aktif.');
        }

        if ($this->kopSuratModel->delete($id)) {
            // Hapus file logo jika ada
            if ($kop->logo && file_exists(FCPATH . 'uploads/logo/' . $kop->logo)) {
                unlink(FCPATH . 'uploads/logo/' . $kop->logo);
            }

            return redirect()->back()->with('success', 'Kop surat berhasil dihapus.');
        }

        return redirect()->back()->with('error', 'Gagal menghapus data.');
    }
}
