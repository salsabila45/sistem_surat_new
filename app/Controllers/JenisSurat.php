<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JenisSuratModel;
use App\Models\TemplateSuratModel;
use CodeIgniter\HTTP\ResponseInterface;

class JenisSurat extends BaseController
{
    public function index()
    {
        $perPage = 12;
        // Replace findAll() with paginate() method
        $jenisSurat = $this->jenisSuratModel->paginate($perPage, 'jenis_surat'); // 10 items per page

        // Get the pager instance
        $pager = $this->jenisSuratModel->pager;

        return view('pages/admin/jenis_surat/index', [
            'jenisSurat' => $jenisSurat,
            'pager' => $pager, // Pass pager to the view
            'user' => $this->user,
            'siteLogo' => $this->getSiteLogo(),
            'siteName' => $this->getSiteName(),
            'halamanIni' => $this->getHalamanIni($this->currentUrl),
            'sidebarMenu' => $this->menuModel->where('role', $this->user['role'])->where('is_active', 1)->findAll(),
        ]);
    }

    public function search()
    {
        $keyword = $this->request->getGet('keyword');
        $page = $this->request->getGet('page_jenis_surat') ?? 1;

        $query = $this->jenisSuratModel
            ->select('jenis_surat.*');

        if (!empty($keyword)) {
            $query = $query->groupStart()
                ->like('jenis_surat.kode', $keyword)
                ->orLike('jenis_surat.nama', $keyword)
                ->groupEnd();
        }

        // Use paginate instead of findAll
        $jenisSurat = $query->paginate(12, 'jenis_surat', $page);
        $pager = $query->pager;

        $data['keyword'] = $keyword;
        $data['jenisSurat'] = $jenisSurat;
        $data['pager'] = $pager; // Pass pager to view
        $data['user'] = $this->user;
        $data['siteLogo'] = $this->getSiteLogo();
        $data['halamanIni'] = $this->getHalamanIni($this->currentUrl);

        return view('pages/admin/jenis_surat/index', $data);
    }

    public function form_tambah()
    {
        $data = [
            'user' => $this->user,
            'siteLogo' => $this->getSiteLogo(),
            'siteName' => $this->getSiteName(),
            'halamanIni' => $this->getHalamanIni($this->currentUrl),
            'sidebarMenu' => $this->menuModel->where('role', $this->user['role'])->where('is_active', 1)->findAll(),
        ];
        return view('pages/admin/jenis_surat/form_tambah', $data);
    }

    // ✅ Save new jenis surat
    public function simpan()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'kode'        => 'required|is_unique[jenis_surat.kode]',
            'nama'        => 'required|min_length[3]',
            'status'      => 'required|in_list[aktif,nonaktif]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $this->jenisSuratModel->save([
            'kode'        => $this->request->getPost('kode'),
            'nama'        => $this->request->getPost('nama'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'status'      => $this->request->getPost('status'),
        ]);

        return redirect()->to(base_url('admin/jenis-surat'))->with('success', 'Data jenis surat berhasil disimpan.');
    }

    public function form_edit($id)
    {
        $jenisSurat = $this->jenisSuratModel->find($id);

        if (!$jenisSurat) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Jenis surat tidak ditemukan');
        }

        $data = [
            'jenis_surat' => $jenisSurat,
            'user' => $this->user,
            'siteLogo' => $this->getSiteLogo(),
            'siteName' => $this->getSiteName(),
            'halamanIni' => $this->getHalamanIni($this->currentUrl),
            'sidebarMenu' => $this->menuModel->where('role', $this->user['role'])->where('is_active', 1)->findAll(),
        ];

        return view('pages/admin/jenis_surat/form_edit', $data);
    }

    public function update($id)
    {
        $validation = \Config\Services::validation();

        $rules = [
            'nama' => 'required|min_length[3]',
            'status' => 'required|in_list[aktif,nonaktif]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $this->jenisSuratModel->update($id, [
            'kode'        => $this->request->getPost('kode'),
            'nama'        => $this->request->getPost('nama'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'template'    => $this->request->getPost('template'),
            'persyaratan' => $this->request->getPost('persyaratan'),
            'status'      => $this->request->getPost('status'),
        ]);

        return redirect()->to(base_url('admin/jenis-surat'))->with('success', 'Data jenis surat berhasil diperbarui.');
    }

    public function template_index($id)
    {

        $jenisSurat = $this->jenisSuratModel->where('id', $id)->first();
        $kopSurat = $this->kopSuratModel->find(1);

        if (!$jenisSurat) {
            return redirect()->to('/404');
        }

        return view('pages/admin/jenis_surat/form_template', [
            'jenisSurat' => $jenisSurat,
            'user' => $this->user,
            'kopSurat' => $kopSurat,
            'siteLogo' => $this->getSiteLogo(),
            'siteName' => $this->getSiteName(),
            'halamanIni' => $this->getHalamanIni($this->currentUrl),
            'sidebarMenu' => $this->menuModel->where('role', $this->user['role'])->where('is_active', 1)->findAll(),
        ]);
    }

    public function hapus($id)
    {
        $jenisSurat = $this->jenisSuratModel->find($id);

        if (!$jenisSurat) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        $this->jenisSuratModel->delete($id);

        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
