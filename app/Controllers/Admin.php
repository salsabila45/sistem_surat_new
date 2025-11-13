<?php

namespace App\Controllers;

use App\Models\PengajuanSuratModel;

class Admin extends BaseController
{
    public function index()
    {

        $totalDiajukan = $this->pengajuanModel
            ->where('status', 'diajukan')
            ->countAllResults();

        // Total surat dengan status verifikasi
        $totalVerifikasi = $this->pengajuanModel
            ->where('status', 'verifikasi')
            ->countAllResults();

        // Total surat dengan status selesai
        $totalSelesai = $this->pengajuanModel
            ->where('status', 'selesai')
            ->countAllResults();

        $totalPengajuan =  $this->pengajuanModel
            ->countAllResults();

        // Total seluruh pengajuan dalam 30 hari terakhir
        $tanggalSekarang = date('Y-m-d');
        $tanggalBatas = date('Y-m-d', strtotime('-30 days'));


        $totalDiajukan1B = $this->pengajuanModel
            ->where('tanggal_pengajuan >=', $tanggalBatas)
            ->where('tanggal_pengajuan <=', $tanggalSekarang)
            ->where('status', 'diajukan')
            ->countAllResults();
        $totalVerifikas1B = $this->pengajuanModel
            ->where('tanggal_pengajuan >=', $tanggalBatas)
            ->where('tanggal_pengajuan <=', $tanggalSekarang)
            ->where('status', 'verifikasi')
            ->countAllResults();
        $totalSelesai1B = $this->pengajuanModel
            ->where('tanggal_pengajuan >=', $tanggalBatas)
            ->where('tanggal_pengajuan <=', $tanggalSekarang)
            ->where('status', 'selesai')
            ->countAllResults();
        $totalPengajuan1B = $this->pengajuanModel
            ->where('tanggal_pengajuan >=', $tanggalBatas)
            ->where('tanggal_pengajuan <=', $tanggalSekarang)
            ->countAllResults();

        $pengajuanSurat = $this->pengajuanModel
            ->orderBy('tanggal_pengajuan', 'DESC')
            ->limit(12)
            ->findAll();


        $data = [
            'user' => $this->user,
            'pengajuanSurat' => $pengajuanSurat,
            'pengajuan' => [
                'totalDiajukan' => $totalDiajukan,
                'totalVerifikasi' => $totalVerifikasi,
                'totalSelesai' => $totalSelesai,
                'totalPengajuan' => $totalPengajuan,
            ],
            'pengajuan1B' => [
                'totalDiajukan' => $totalDiajukan1B,
                'totalVerifikasi' => $totalVerifikas1B,
                'totalSelesai' => $totalSelesai1B,
                'totalPengajuan' => $totalPengajuan1B,
            ],
            'siteLogo' => $this->getSiteLogo(),
            'siteName' => $this->getSiteName(),
            'halamanIni' => $this->getHalamanIni($this->currentUrl),
            'sidebarMenu' => $this->menuModel->where('role', $this->user['role'])->where('is_active', 1)->findAll(),
        ];

        // print_r($data);

        return view('pages/admin/dashboard/index', $data);
    }
}
