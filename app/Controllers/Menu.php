<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Menu extends BaseController
{
    public function __construct()
    {
        helper(['form']);
    }

    public function toggleMenu($menuId)
    {

        // Get current status
        $menu = $this->menuModel->find($menuId);
        $newStatus = $menu['is_active'] ? 0 : 1;

        // Toggle it
        $this->menuModel->update($menuId, ['is_active' => $newStatus]);

        return redirect()->back()->with('success', 'Menu updated!');
    }

    public function kelolaMenu()
    {
        $data = [
            'admin_menus' => $this->menuModel->where('role', 'admin')->findAll(),
            'warga_menus' => $this->menuModel->where('role', 'masyarakat')->findAll(),
            'user' => $this->user,
            'siteLogo' => $this->getSiteLogo(),
            'siteName' => $this->getSiteName(),
            'halamanIni' => $this->getHalamanIni($this->currentUrl),
            'sidebarMenu' => $this->menuModel->where('role', $this->user['role'])->where('is_active', 1)->findAll(),
        ];

        return view('pages/admin/hak_akses/form_edit', $data);
    }
}
