<?php

namespace App\Controllers;

use App\Config\Services;
use App\Models\BeritaModel;
use App\Models\SysConfigModel;

class Home extends BaseController
{
    public function index()
    {

        $dataBerita = $this->beritaModel->getBeritaWithKategori(6);
        $sejarahDesa = $this->sysConfigModel->where('key', 'sejarah_desa')->first();
        $ilustrasiDesa = $this->sysConfigModel->where('key', 'gambar_ilustrasi')->first();
        $visiDesa = $this->sysConfigModel->where('key', 'visi')->first();
        $misiDesa = $this->sysConfigModel->where('key', 'misi')->first();
        $judulSambutan = $this->sysConfigModel->where('key', 'judul_sambutan')->first();
        $subJudulSambutan = $this->sysConfigModel->where('key', 'subjudul_sambutan')->first();


        $data = [
            'dataBerita' => $dataBerita,
            'sejarahDesa' => $sejarahDesa['value'],
            'visiDesa' => $visiDesa['value'],
            'misiDesa' => $misiDesa['value'],
            'judulSambutan' => $judulSambutan['value'],
            'subJudulSambutan' => $subJudulSambutan['value'],
            'siteLogo' => $this->getSiteLogo(),
            'ilustrasiDesa' => $ilustrasiDesa['value'],
            'siteName' => $this->getSiteName(),
        ];

        return view('pages/home', $data);
    }

    public function sejarah()
    {
        $sejarahDesa = $this->sysConfigModel->where('key', 'sejarah_desa')->first();
        $visiDesa = $this->sysConfigModel->where('key', 'visi')->first();
        $misiDesa = $this->sysConfigModel->where('key', 'misi')->first();
        $gambarDesa = $this->sysConfigModel->where('key', 'gambar_desa')->first();

        $data = [
            'sejarahDesa' => $sejarahDesa['value'],
            'visiDesa' => $visiDesa['value'],
            'misiDesa' => $misiDesa['value'],
            'siteLogo' => $this->getSiteLogo(),
            'siteName' => $this->getSiteName(),
            'gambarDesa' => $gambarDesa['value'],
        ];

        return view('pages/sejarah', $data);
    }
}
