<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\WargaModel;
use CodeIgniter\HTTP\ResponseInterface;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DataWarga extends BaseController
{
    public function index()
    {
        $perPage = 12;

        $dataWarga = $this->wargaModel->paginate($perPage, 'warga');
        $pager   = $this->wargaModel->pager;

        $totalWarga = $this->wargaModel->countAllResults(); // total semua warga
        $totalAktif = $this->wargaModel->where('status', 'aktif')->countAllResults(); // total aktif
        $totalNonaktif = $this->wargaModel->where('status', 'nonaktif')->countAllResults(); // total nonaktif

        return view('pages/admin/data_warga/index', [
            'user'  => $this->user,
            'dataWarga' => $dataWarga,
            'pager'         => $pager,
            'totalWarga'    => $totalWarga,
            'totalAktif'    => $totalAktif,
            'totalNonaktif' => $totalNonaktif,
            'siteLogo' => $this->getSiteLogo(),
            'siteName' => $this->getSiteName(),
            'halamanIni' => $this->getHalamanIni($this->currentUrl),
            'sidebarMenu' => $this->menuModel->where('role', $this->user['role'])->where('is_active', 1)->findAll(),
        ]);
    }

    public function form_tambah()
    {
        return view('pages/admin/data_warga/form_tambah', [
            'user'  => $this->user,
            'siteLogo' => $this->getSiteLogo(),
            'siteName' => $this->getSiteName(),
            'halamanIni' => $this->getHalamanIni($this->currentUrl),
            'sidebarMenu' => $this->menuModel->where('role', $this->user['role'])->where('is_active', 1)->findAll(),
        ]);
    }

    public function tambah()
    {
        $data = [
            'nik'           => $this->request->getPost('nik'),
            'nama_lengkap'  => $this->request->getPost('nama'),
            'tempat_lahir'  => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir'  => $this->request->getPost('tanggal_lahir'),
            'alamat'        => $this->request->getPost('alamat'),
            'no_hp'         => $this->request->getPost('no_hp'),
            'email'         => $this->request->getPost('email'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'agama'         => $this->request->getPost('agama'),
            'status'        => $this->request->getPost('status'),
        ];

        // Simple validation
        if (empty($data['nik']) || empty($data['nama_lengkap'])) {
            return redirect()->back()
                ->with('error', 'NIK dan Nama wajib diisi!')
                ->withInput();
        }

        // Check duplicate NIK
        $existing = $this->wargaModel->where('nik', $data['nik'])->first();
        if ($existing) {
            return redirect()->back()
                ->with('error', 'NIK sudah terdaftar!')
                ->withInput();
        }

        // Insert to database
        $this->wargaModel->insert($data);

        // Redirect with success message
        return redirect()->to(base_url('admin/data-warga'))
            ->with('success', 'Data warga berhasil disimpan!');
    }

    public function form_edit($id)
    {
        $warga = $this->wargaModel->where('id', $id)->first();
        return view('pages/admin/data_warga/form_edit', [
            'warga' => $warga,
            'user' => $this->user,
            'siteLogo' => $this->getSiteLogo(),
            'siteName' => $this->getSiteName(),
            'halamanIni' => $this->getHalamanIni($this->currentUrl),
            'sidebarMenu' => $this->menuModel->where('role', $this->user['role'])->where('is_active', 1)->findAll(),
        ]);
    }

    public function update($id)
    {
        $this->wargaModel->update($id, [
            'nik'           => $this->request->getPost('nik'),
            'nama_lengkap'  => $this->request->getPost('nama'),
            'tempat_lahir'  => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir'  => $this->request->getPost('tanggal_lahir'),
            'alamat'        => $this->request->getPost('alamat'),
            'no_hp'         => $this->request->getPost('no_hp'),
            'email'         => $this->request->getPost('email'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'agama'         => $this->request->getPost('agama'),
            'status'        => $this->request->getPost('status'),
        ]);

        return redirect()->to(base_url('admin/data-warga'))->with('success', 'Data berhasil diperbarui');
    }

    public function delete($id)
    {
        // Check if data exists
        $warga = $this->wargaModel->find($id);
        if (!$warga) {
            return redirect()->back()->with('error', 'Data warga tidak ditemukan');
        }

        // Delete the record
        $this->wargaModel->delete($id);

        // Redirect back with success message
        return redirect()->to(base_url('admin/data-warga'))
            ->with('success', 'Data warga berhasil dihapus');
    }

    public function search()
    {
        $keyword = $this->request->getGet('keyword'); // ambil keyword (nama/nik)
        $alamat  = $this->request->getGet('alamat');  // ambil alamat dari input
        $perPage = 12;

        // kalau semua field kosong
        if (!$keyword && !$alamat) {
            return redirect()->to(base_url('admin/data-warga'))
                ->with('error', 'Masukkan NIK, Nama, atau Alamat untuk mencari data');
        }

        // mulai query builder
        $builder = $this->wargaModel;

        // kalau keyword ada → cari di nama_lengkap atau nik
        if ($keyword) {
            $builder = $builder
                ->groupStart()
                ->like('nama_lengkap', $keyword)
                ->orLike('nik', $keyword)
                ->groupEnd();
        }

        // kalau alamat ada → tambahkan filter
        if ($alamat) {
            $builder = $builder->like('alamat', $alamat);
        }

        $results = $builder->paginate($perPage, 'warga');
        $pager   = $this->wargaModel->pager;

        // kalau tidak ada hasil
        if (empty($results)) {
            return redirect()->to(base_url('admin/data-warga/search?keyword=' . $keyword . '&alamat=' . $alamat))
                ->with('error', 'Data tidak ditemukan');
        }

        $totalWarga = $this->wargaModel->countAllResults(false);
        $totalAktif = $this->wargaModel->where('status', 'aktif')->countAllResults(false);
        $totalNonaktif = $this->wargaModel->where('status', 'nonaktif')->countAllResults(false);


        // tampilkan hasil ke view
        return view('pages/admin/data_warga/index', [
            'user'          => $this->user,
            'dataWarga'     => $results,
            'pager'         => $pager,
            'keyword'       => $keyword,
            'alamat'        => $alamat,
            'totalWarga'    => $totalWarga,
            'totalAktif'    => $totalAktif,
            'totalNonaktif' => $totalNonaktif,
            'success'       => 'Hasil pencarian ditampilkan',
            'siteLogo' => $this->getSiteLogo(),
            'siteName' => $this->getSiteName(),
            'halamanIni' => $this->getHalamanIni($this->currentUrl),
            'sidebarMenu' => $this->menuModel->where('role', $this->user['role'])->where('is_active', 1)->findAll(),
        ]);
    }

    public function detail($id)
    {
        $dataWarga = $this->wargaModel->find($id);

        return view('pages/admin/data_warga/detail', [
            'user'          => $this->user,
            'warga' => $dataWarga,
            'siteLogo' => $this->getSiteLogo(),
            'siteName' => $this->getSiteName(),
            'halamanIni' => $this->getHalamanIni($this->currentUrl),
            'sidebarMenu' => $this->menuModel->where('role', $this->user['role'])->where('is_active', 1)->findAll(),
        ]);
    }

    public function print_pdf()
    {
        $dataWarga = $this->wargaModel->findAll();
        $kopSurat = $this->kopSuratModel->find(1);

        return view('pages/admin/data_warga/print', [
            'dataWarga' => $dataWarga,
            'kopSurat' => $kopSurat,
        ]);
    }

    public function print_excel()
    {
        $wargaModel = new WargaModel();
        $dataWarga = $wargaModel->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Judul
        $sheet->setCellValue('A1', 'DATA WARGA');
        $sheet->mergeCells('A1:J1');
        $sheet->getStyle('A1')->getFont()->setSize(16)->setBold(true);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Set print date
        $sheet->setCellValue('A2', 'Dicetak pada: ' . date('d F Y H:i:s'));
        $sheet->mergeCells('A2:C2');
        $sheet->getStyle('A2')->getFont()->setSize(10)->setItalic(true);
        $sheet->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

        // Header kolom
        $headers = [
            'No',
            'NIK',
            'Nama Lengkap',
            'TTL',
            'Alamat',
            'No HP',
            'Email',
            'Jenis Kelamin',
            'Agama',
            'Status'
        ];
        $sheet->fromArray($headers, null, 'A3');

        // Style header
        $headerStyle = [
            'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
            'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '3498DB']],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
            'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN]],
        ];
        $sheet->getStyle('A3:J3')->applyFromArray($headerStyle);

        // Isi data
        $row = 4;
        $no = 1;
        foreach ($dataWarga as $data) {
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $data['nik']);
            $sheet->setCellValue('C' . $row, $data['nama_lengkap']);
            $sheet->setCellValue('D' . $row, $data['tempat_lahir'] . ', ' . date('d-m-Y', strtotime($data['tanggal_lahir'])));
            $sheet->setCellValue('E' . $row, $data['alamat']);
            $sheet->setCellValue('F' . $row, $data['no_hp']);
            $sheet->setCellValue('G' . $row, $data['email']);
            $sheet->setCellValue('H' . $row, $data['jenis_kelamin']);
            $sheet->setCellValue('I' . $row, $data['agama']);
            $sheet->setCellValue('J' . $row, $data['status']);

            // Warna selang-seling
            if ($row % 2 == 0) {
                $sheet->getStyle("A{$row}:J{$row}")
                    ->getFill()
                    ->setFillType(Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('F8F9FA');
            }

            $row++;
        }

        // Border seluruh data
        $sheet->getStyle('A3:J' . ($row - 1))
            ->getBorders()->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN);

        // Auto width tiap kolom
        foreach (range('A', 'J') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        // Buat file Excel
        $writer = new Xlsx($spreadsheet);
        $filename = 'data_warga_' . date('Y-m-d') . '.xlsx';

        // Output ke browser
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit();
    }
}
