<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PengajuanSuratModel;
use App\Models\WargaModel;
use CodeIgniter\HTTP\ResponseInterface;

class Masyarakat extends BaseController
{
    public function index()
    {
        $user = $this->user;
        $wargaId = $user['id']; // sesuaikan dengan kolom ID warga di tabel user kamu

        // Hitung jumlah surat berdasarkan status untuk user ini
        $totalDiajukan = $this->pengajuanModel
            ->where('warga_id', $wargaId)
            ->where('status', 'diajukan')
            ->countAllResults();

        $totalVerifikasi = $this->pengajuanModel
            ->where('warga_id', $wargaId)
            ->where('status', 'verifikasi')
            ->countAllResults();

        $totalSelesai = $this->pengajuanModel
            ->where('warga_id', $wargaId)
            ->where('status', 'selesai')
            ->countAllResults();

        $totalDitolak = $this->pengajuanModel
            ->where('warga_id', $wargaId)
            ->where('status', 'ditolak')
            ->countAllResults();

        $totalPengajuan = $this->pengajuanModel
            ->where('warga_id', $wargaId)
            ->countAllResults();

        $pengajuanSurat = $this->pengajuanModel->where('warga_id', $wargaId)->findAll();
        // print_r($pengajuanSurat);

        return view('pages/masyarakat/dashboard/index', [
            'user' => $user,
            'pengajuan' => [
                'totalDiajukan' => $totalDiajukan,
                'totalVerifikasi' => $totalVerifikasi,
                'totalSelesai' => $totalSelesai,
                'totalDitolak' => $totalDitolak,
                'totalPengajuan' => $totalPengajuan
            ],
            'pengajuanSurat' => $pengajuanSurat,
            'siteLogo' => $this->getSiteLogo(),
            'siteName' => $this->getSiteName(),
            'halamanIni' => $this->getHalamanIni($this->currentUrl),
            'sidebarMenu' => $this->menuModel->where('role', $this->user['role'])->where('is_active', 1)->findAll(),
        ]);
    }

    public function profile()
    {
        $dataWarga = $this->wargaModel->find($this->user['id']);

        $data = [
            'dataWarga' => $dataWarga,
            'user' => $this->user,
            'siteLogo' => $this->getSiteLogo(),
            'siteName' => $this->getSiteName(),
            'halamanIni' => $this->getHalamanIni($this->currentUrl),
            'sidebarMenu' => $this->menuModel->where('role', $this->user['role'])->where('is_active', 1)->findAll(),
        ];

        // print_r($dataWarga);
        return view('pages/masyarakat/profile/index', $data);
    }

    public function updateProfile()
    {
        $user = $this->user;
        $id = $user['id'];

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama_lengkap' => 'required|min_length[3]',
            'nik' => 'required|min_length[16]|max_length[16]',
            'alamat' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'no_hp' => 'required|min_length[10]|max_length[15]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->with('error', $validation->getErrors());
        }

        // Data yang diupdate
        $data = [
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'nik' => $this->request->getPost('nik'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'alamat' => $this->request->getPost('alamat'),
            'no_hp' => $this->request->getPost('no_hp'),
            'email' => $this->request->getPost('email'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'agama' => $this->request->getPost('agama'),
        ];

        // Update data warga
        $this->wargaModel->update($id, $data);

        return redirect()->to('/masyarakat/profile')->with('success', 'Profil berhasil diperbarui.');
    }

    public function updatePhoto()
    {
        $foto = $this->request->getFile('foto');
        $user = $this->user;
        $id = $user['id'];

        $data = [];

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $newName = $foto->getRandomName();
            $foto->move('uploads/foto_warga', $newName);
            $data['foto'] = $newName;
        }

        $this->wargaModel->update($id, $data);
        return redirect()->to('/masyarakat/profile')->with('success', 'Profil berhasil diperbarui.');
    }
}
