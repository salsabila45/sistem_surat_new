<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/unauthorized', function () {
    return view('errors/unauthorized');
});

$routes->get('/', 'Home::index');
$routes->get('/login', 'Auth::login_form');
$routes->post('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');

$routes->get('/berita', 'Berita::index');
$routes->get('/sejarah', 'Home::sejarah');

$routes->get('/berita/(:segment)', 'Berita::detailBerita/$1');

$routes->group('admin', ['filter' => 'auth:admin'], function ($routes) {
    $routes->get('dashboard', 'Admin::index');

    //DATA WARGA
    $routes->get('data-warga', 'DataWarga::index');
    $routes->get('data-warga/tambah', 'DataWarga::form_tambah');
    $routes->post('data-warga/tambah', 'DataWarga::tambah');
    $routes->get('data-warga/edit/(:num)', 'DataWarga::form_edit/$1');
    $routes->post('data-warga/update/(:num)', 'DataWarga::update/$1');
    $routes->get('data-warga/delete/(:num)', 'DataWarga::delete/$1');
    $routes->get('data-warga/detail/(:num)', 'DataWarga::detail/$1');
    $routes->get('data-warga/search', 'DataWarga::search');
    $routes->get('data-warga/print/pdf', 'DataWarga::print_pdf');
    $routes->get('data-warga/print/excel', 'DataWarga::print_excel');

    $routes->get('jenis-surat', 'JenisSurat::index');
    $routes->get('jenis-surat/search', 'JenisSurat::search');
    $routes->get('jenis-surat/tambah', 'JenisSurat::form_tambah');
    $routes->post('jenis-surat/simpan', 'JenisSurat::simpan');
    $routes->get('jenis-surat/edit/(:num)', 'JenisSurat::form_edit/$1');
    $routes->post('jenis-surat/update/(:num)', 'JenisSurat::update/$1');
    $routes->get('jenis-surat/hapus/(:num)', 'JenisSurat::hapus/$1');
    $routes->get('jenis-surat/(:num)/template', 'JenisSurat::template_index/$1');
    $routes->post('jenis-surat/(:num)/template/simpan', 'TemplateSurat::simpan/$1');
    $routes->post('jenis-surat/(:num)/template/update', 'TemplateSurat::update/$1');
    $routes->get('pengajuan-surat', 'PengajuanSurat::admin_index');
    $routes->get('pengajuan-surat/(:num)', 'PengajuanSurat::admin_detail/$1');
    $routes->get('pengajuan-surat/(:num)/edit', 'PengajuanSurat::admin_edit/$1');
    $routes->post('pengajuan-surat/(:num)/update', 'PengajuanSurat::updateSurat/$1');
    $routes->get('pengajuan-surat/(:num)/hapus', 'PengajuanSurat::hapus/$1');
    $routes->post('pengajuan-surat/(:num)/ubah-status', 'PengajuanSurat::ubahStatus/$1');

    // Arsip Surat
    $routes->get('arsip-surat', 'ArsipSurat::index');
    $routes->post('arsip-surat', 'ArsipSurat::index');
    $routes->get('arsip-surat/print/pdf', 'ArsipSurat::print_pdf');
    $routes->get('arsip-surat/print/excel', 'ArsipSurat::print_excel');

    //Laporan
    $routes->get('laporan', 'Laporan::index');
    $routes->get('laporan/print/pdf', 'Laporan::print_pdf');
    $routes->get('laporan/print/excel', 'Laporan::print_excel');


    //Konfigurasi
    $routes->get('profile', 'SysConfig::profile_sistem');
    $routes->post('profile/update', 'SysConfig::profile_update');
    $routes->post('welcome-page/update', 'SysConfig::updateWelcomePage');
    $routes->get('hak-akses', 'Menu::kelolaMenu');
    $routes->get('hak-akses/toggle/(:num)', 'Menu::toggleMenu/$1');

    //Kelola Akun
    $routes->get('kelola-akun', 'Akun::index');
    $routes->get('kelola-akun/tambah', 'Akun::form_tambah');
    $routes->post('kelola-akun/tambah', 'Akun::simpan');
    $routes->get('kelola-akun/edit/(:num)', 'Akun::edit/$1');
    $routes->post('kelola-akun/update/(:num)', 'Akun::update/$1');
    $routes->get('kelola-akun/hapus/(:num)', 'Akun::hapus/$1');

    //Berita
    $routes->get('daftar-berita', 'Berita::daftarBerita');
    $routes->get('tulis-berita', 'Berita::form_tambah');
    $routes->post('berita/simpan', 'Berita::simpan');

    // Kop Surat
    $routes->get('kop-surat', 'KopSurat::edit');
    $routes->post('kop-surat/update/(:num)', 'KopSurat::update/$1');
    $routes->get('kop-surat/delete/(:num)', 'KopSurat::delete/$1');
});

$routes->group('masyarakat', ['filter' => 'auth:masyarakat'], function ($routes) {
    $routes->get('dashboard', 'Masyarakat::index');
    $routes->get('pengajuan-surat', 'PengajuanSurat::index');
    $routes->get('pengajuan-surat/(:num)/hapus', 'PengajuanSurat::hapus/$1');
    $routes->post('pengajuan-surat/simpan', 'PengajuanSurat::simpan');
    $routes->get('riwayat-pengajuan', 'PengajuanSurat::riwayat');
    $routes->get('profile', 'Masyarakat::profile');
    $routes->post('profile/update', 'Masyarakat::updateProfile');
    $routes->post('profile/update-photo', 'Masyarakat::updatePhoto');
});

$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('surat/download/(:num)', 'PengajuanSurat::download/$1');
    $routes->get('lampiran/download/(:any)', 'PengajuanSurat::download_lampiran/$1');
});
