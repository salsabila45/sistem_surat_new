<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\KategoriModel;
use App\Models\SysConfigModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\I18n\Time;

class Berita extends BaseController
{
    public function index()
    {
        $logoDesa = $this->sysConfigModel->where('key', 'gambar_desa')->first();
        $dataBerita = $this->beritaModel->getBeritaWithKategori();

        $data = [
            'dataBerita' => $dataBerita,
            'siteLogo' => $this->getSiteLogo(),
            'siteName' => $this->getSiteName(),
            'halamanIni' => $this->getHalamanIni($this->currentUrl),
        ];

        return view('pages/berita/index', $data);
    }

    public function detailBerita($slug)
    {

        $logoDesa = $this->sysConfigModel->where('key', 'gambar_desa')->first();
        $dataBerita = $this->beritaModel->getBeritaWithKategori(6);
        $detailBerita = $this->beritaModel
            ->select('berita.*, penulis.nama AS nama_penulis, kategori_berita.nama as kategori') // pilih kolom berita + nama penulis
            ->join('penulis', 'penulis.id = berita.penulis_id') // join tabel penulis
            ->join('kategori_berita', 'kategori_berita.id = berita.kategori_id')
            ->where('berita.slug', $slug)
            ->first();

        $data = [
            'dataBerita' => $dataBerita,
            'detailBerita' => $detailBerita,
            'siteLogo' => $this->getSiteLogo(),
            'siteName' => $this->getSiteName(),
            'halamanIni' => $this->getHalamanIni($this->currentUrl),
        ];

        // print_r($detailBerita);

        return view('pages/berita/detail', $data);
    }

    public function daftarBerita()
    {
        // Get current page from URL, default to 1
        $currentPage = $this->request->getVar('page_berita') ?? 1;

        // Configure pagination - 10 items per page
        $perPage = 10;

        // Get paginated data
        $daftarBerita = $this->beritaModel
            ->select('berita.*, admin.name AS penulis, kategori_berita.nama AS kategori')
            ->join('admin', 'admin.id = berita.penulis_id')
            ->join('kategori_berita', 'kategori_berita.id = berita.kategori_id')
            ->paginate($perPage, 'berita', $currentPage);

        // Get pager instance
        $pager = $this->beritaModel->pager;

        $data = [
            'user' => $this->user,
            'daftarBerita' => $daftarBerita,
            'pager' => $pager, // Pass pager to view
            'siteLogo' => $this->getSiteLogo(),
            'siteName' => $this->getSiteName(),
            'halamanIni' => $this->getHalamanIni($this->currentUrl),
            'sidebarMenu' => $this->menuModel->where('role', $this->user['role'])->where('is_active', 1)->findAll(),
        ];

        return view('pages/admin/berita/index', $data);
    }

    public function form_tambah()
    {
        $data = [
            'user' => $this->user,
            'kategori' => $this->kategoriModel->findAll(),
            'siteLogo' => $this->getSiteLogo(),
            'siteName' => $this->getSiteName(),
            'halamanIni' => $this->getHalamanIni($this->currentUrl),
            'sidebarMenu' => $this->menuModel->where('role', $this->user['role'])->where('is_active', 1)->findAll(),
        ];
        return view('pages/admin/berita/form_tambah', $data);
    }

    public function simpan()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'judul' => 'required|min_length[3]',
            'isi' => 'required',
            'kategori_id' => 'required|integer',
            'gambar' => 'uploaded[gambar]|is_image[gambar]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $file = $this->request->getFile('gambar');
        $fileName = $file->getRandomName();
        $file->move('uploads/berita', $fileName);

        $judul = $this->request->getPost('judul');
        $slug = url_title($judul, '-', true); // generate slug from title

        // Check if slug already exists (to avoid duplicates)
        $existing = $this->beritaModel->where('slug', $slug)->first();
        if ($existing) {
            $slug .= '-' . Time::now()->getTimestamp();
        }

        $this->beritaModel->insert([
            'judul' => $judul,
            'slug' => $slug,
            'isi' => $this->request->getPost('isi'),
            'gambar' => $fileName,
            'kategori_id' => $this->request->getPost('kategori_id'),
            'penulis_id' => 1,
        ]);

        return redirect()->to('/admin/tulis-berita')->with('success', 'Berita berhasil ditambahkan!');
    }
}
