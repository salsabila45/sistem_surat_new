<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use CodeIgniter\HTTP\ResponseInterface;

class Akun extends BaseController
{

    public function index()
    {

        $data = [
            'admins' =>  $this->adminModel->orderBy('id', 'DESC')->findAll(),
            'user' => $this->user,
            'siteLogo' => $this->getSiteLogo(),
            'siteName' => $this->getSiteName(),
            'halamanIni' => $this->getHalamanIni($this->currentUrl),
            'sidebarMenu' => $this->menuModel->where('role', $this->user['role'])->where('is_active', 1)->findAll(),
        ];

        return view('pages/admin/kelola_akun/index', $data);
    }

    /**
     * Form tambah admin
     */
    public function form_tambah()
    {
        $data = [
            'user' => $this->user,
            'siteLogo' => $this->getSiteLogo(),
            'siteName' => $this->getSiteName(),
            'halamanIni' => $this->getHalamanIni($this->currentUrl),
            'sidebarMenu' => $this->menuModel->where('role', $this->user['role'])->where('is_active', 1)->findAll(),
        ];

        return view('pages/admin/kelola_akun/form_tambah', $data);
    }

    /**
     * Simpan admin baru
     */
    public function simpan()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'username' => 'required|min_length[3]|is_unique[admin.username]',
            'password' => 'required|min_length[6]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $this->adminModel->insert([
            'name' => $this->request->getPost('name'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
        ]);

        return redirect()->to('/admin/kelola-akun')->with('success', $this->request->getPost('username') . ' berhasil ditambahkan!');
    }

    /**
     * Form edit admin
     */
    public function edit($id)
    {
        $data = [
            'admin' =>  $this->adminModel->find($id),
            'user' => $this->user,
            'siteLogo' => $this->getSiteLogo(),
            'siteName' => $this->getSiteName(),
            'halamanIni' => $this->getHalamanIni($this->currentUrl),
            'sidebarMenu' => $this->menuModel->where('role', $this->user['role'])->where('is_active', 1)->findAll(),
        ];

        if (!$data['admin']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Admin dengan ID $id tidak ditemukan.");
        }

        return view('pages/admin/kelola_akun/form_edit', $data);
    }

    /**
     * Update data admin
     */
    public function update($id)
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'username' => "required|min_length[3]|is_unique[admin.username,id,{$id}]",
            'password' => 'permit_empty|min_length[6]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'username' => $this->request->getPost('username'),
        ];

        // update password hanya jika diisi
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = $password;
        }

        $this->adminModel->update($id, $data);

        return redirect()->to('/admin/kelola-akun')->with('success', 'Data akun berhasil diperbarui!');
    }

    /**
     * Hapus admin
     */
    public function hapus($id)
    {
        $this->adminModel->delete($id);
        return redirect()->to('/admin/kelola-akun')->with('success', 'Akun berhasil dihapus!');
    }
}
