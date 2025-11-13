<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\WargaModel;

class Auth extends BaseController
{
    public function login_form()
    {

        if ($this->user && $this->user['isLoggedIn']) {
            switch ($this->user['role']) {
                case 'admin':
                    return redirect()->to('/admin/dashboard');
                    break;
                case 'masyarakat':
                    return redirect()->to('/masyarakat/dashboard');
                    break;
                default:
                    return redirect()->back();
            }
        }

        $loginType = $this->request->getGet('type') ?? 'masyarakat';
        return view('pages/auth/login', ["login_type" => $loginType]);
    }

    public function login()
    {
        $session = session();
        $session->set('error', '');

        // Get login type (?type=admin or ?type=masyarakat)
        $loginType = $this->request->getGet('type');

        // Get form data
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $nama     = trim($this->request->getPost('nama'));
        $tglLahir = trim($this->request->getPost('tanggal_lahir'));


        // Basic validation
        if ($loginType === 'admin' && (empty($username) || empty($password))) {
            $session->set('error', 'Username dan password harus diisi');
            return redirect()->back()->withInput();
        }

        if ($loginType === 'masyarakat') {
            if (empty($nama) || empty($tglLahir)) {
                $session->set('error', 'Nama dan tanggal lahir harus diisi');
                return redirect()->back()->withInput();
            }
        }

        // ===== ADMIN LOGIN =====
        if ($loginType === 'admin') {
            $adminModel = new AdminModel();
            $admin = $adminModel->where('username', $username)->first();

            if ($admin && password_verify($password, $admin['password'])) {
                $session->set('user', [
                    'isLoggedIn' => true,
                    'id'         => $admin['id'],
                    'username'   => $admin['username'],
                    'name'       => $admin['name'],
                    'role'       => 'admin',
                ]);

                return redirect()->to('/admin/dashboard');
            } else {
                $session->set('error', 'Username atau password salah');
                return redirect()->back()->withInput();
            }
        }

        if ($loginType === 'masyarakat') {
            $wargaModel = new WargaModel();
            $namaNormalized = strtolower($nama);

            $warga = $wargaModel
                ->where('LOWER(nama_lengkap)', $namaNormalized)
                ->where('tanggal_lahir', $tglLahir)
                ->first();

            if ($warga) {
                $session->set('user', [
                    'isLoggedIn' => true,
                    'id'         => $warga['id'],
                    'nik'        => $warga['nik'],
                    'name'       => $warga['nama_lengkap'],
                    'role'       => 'masyarakat',
                ]);

                return redirect()->to('/masyarakat/dashboard');
            } else {
                $session->set('error', 'Nama atau tanggal lahir tidak ditemukan');
                return redirect()->back()->withInput();
            }
        }

        // ===== INVALID LOGIN TYPE =====
        $session->set('error', 'Tipe login tidak valid');
        return redirect()->back();
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Anda telah logout.');
    }
}
