<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JenisSuratModel;
use App\Models\PengajuanSuratModel;
use CodeIgniter\HTTP\ResponseInterface;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends BaseController
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

        // Total surat dengan status selesai
        $totalDitolak = $this->pengajuanModel
            ->where('status', 'ditolak')
            ->countAllResults();

        $totalPengajuan = $this->pengajuanModel
            ->countAllResults();

        $periode = $this->request->getGet('periode') ?? 'bulanan'; // harian/bulanan/tahunan
        $jenisSuratFilter = $this->request->getGet('jenis_surat_id');

        // ambil semua data dari pengajuan_surat
        $query = $this->pengajuanModel;

        // filter jenis surat kalau ada
        if (!empty($jenisSuratFilter)) {
            $query->where('jenis_surat_id', $jenisSuratFilter);
        }

        // filter periode waktu
        switch ($periode) {
            case 'bulanan':
                $query->where('MONTH(tanggal_pengajuan)', date('m'))
                    ->where('YEAR(tanggal_pengajuan)', date('Y'));
                break;
            case 'tahunan':
                $query->where('YEAR(tanggal_pengajuan)', date('Y'));
                break;
            default: // harian
                $query->where('DATE(tanggal_pengajuan)', date('Y-m-d'));
                break;
        }

        $allData = $query->findAll();

        // grupkan data berdasarkan jenis_surat_id
        $pengajuanSurat = [];
        foreach ($allData as $item) {
            $jenisId = $item['jenis_surat_id'];

            if (!isset($pengajuanSurat[$jenisId])) {
                $pengajuanSurat[$jenisId] = [
                    'jenis_surat' => $item['jenis_surat'],
                    'jenis_surat_id' => $jenisId,
                    'total_diajukan' => 0,
                    'total_verifikasi' => 0,
                    'total_ditolak' => 0,
                    'total_selesai' => 0,
                    'total_arsip' => 0,
                    'total_pengajuan' => 0
                ];
            }

            // hitung status
            switch ($item['status']) {
                case 'diajukan':
                    $pengajuanSurat[$jenisId]['total_diajukan']++;
                    break;
                case 'verifikasi':
                    $pengajuanSurat[$jenisId]['total_verifikasi']++;
                    break;
                case 'ditolak':
                    $pengajuanSurat[$jenisId]['total_ditolak']++;
                    break;
                case 'selesai':
                    $pengajuanSurat[$jenisId]['total_selesai']++;
                    break;
            }

            $pengajuanSurat[$jenisId]['total_pengajuan']++;

            if (!empty($item['diarsipkan'])) {
                $pengajuanSurat[$jenisId]['total_arsip']++;
            }
        }

        $tahunSekarang = date('Y');

        $dataPerBulan = $this->pengajuanModel
            ->select("MONTH(tanggal_pengajuan) AS bulan, COUNT(*) AS total")
            ->where("YEAR(tanggal_pengajuan)", $tahunSekarang)
            ->groupBy("MONTH(tanggal_pengajuan)")
            ->orderBy("bulan", "ASC")
            ->findAll();

        // Siapkan array dengan 12 bulan default = 0
        $totalAjuanPerBulan = array_fill(1, 12, 0);

        // Masukkan data dari query ke array
        foreach ($dataPerBulan as $row) {
            $bulan = (int) $row['bulan'];
            $totalAjuanPerBulan[$bulan] = (int) $row['total'];
        }

        // ubah jadi array biasa (biar gampang ditampilkan di view)
        $pengajuanSurat = array_values($pengajuanSurat);

        $jenisSuratList = $this->jenisSuratModel->findAll();

        $data = [
            'user' => $this->user,
            'pengajuanSurat' => $pengajuanSurat,
            'jenisSuratList' => $jenisSuratList,
            'totalAjuanPerBulan' => $totalAjuanPerBulan,
            'pengajuan' => [
                'totalDiajukan' => $totalDiajukan,
                'totalVerifikasi' => $totalVerifikasi,
                'totalSelesai' => $totalSelesai,
                'totalDitolak' => $totalDitolak,
                'totalPengajuan' => $totalPengajuan,
            ],
            'filters' => [
                'periode' => $periode
            ],
            'siteLogo' => $this->getSiteLogo(),
            'siteName' => $this->getSiteName(),
            'halamanIni' => $this->getHalamanIni($this->currentUrl),
            'sidebarMenu' => $this->menuModel->where('role', $this->user['role'])->where('is_active', 1)->findAll(),
        ];

        // print_r($pengajuanSurat);

        return view('pages/admin/laporan/index', $data);
    }

    public function print_pdf()
    {
        $pengajuanSurat = $this->pengajuanModel->findAll();
        $kopSurat = $this->kopSuratModel->find(1);

        return view('pages/admin/laporan/print', [
            'pengajuanSurat' => $pengajuanSurat,
            'kopSurat' => $kopSurat,
        ]);
    }

    public function print_excel()
    {
        $dataArsip = $this->pengajuanModel->where('diarsipkan', 1)->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Judul
        $sheet->setCellValue('A1', 'DATA PENGAJUAN SURAT');
        $sheet->mergeCells('A1:I1');
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
            'No Surat',
            'NIK',
            'Nama',
            'Jenis Surat',
            'Keperluan',
            'Tanggal Pengajuan',
            'Tanggal Selesai',
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
        $sheet->getStyle('A3:I3')->applyFromArray($headerStyle);

        // Isi data
        $row = 4;
        $no = 1;
        foreach ($dataArsip as $data) {
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $data['no_surat']);
            $sheet->setCellValue('C' . $row, $data['nik']);
            $sheet->setCellValue('D' . $row, $data['nama']);
            $sheet->setCellValue('E' . $row, $data['jenis_surat']);
            $sheet->setCellValue('F' . $row, $data['keperluan']);
            $sheet->setCellValue('G' . $row, date('d-m-Y', strtotime($data['tanggal_pengajuan'])));
            $sheet->setCellValue('H' . $row, $data['tanggal_selesai'] ? date('d-m-Y', strtotime($data['tanggal_selesai'])) : '-');
            $sheet->setCellValue('I' . $row, ucfirst($data['status']));

            // Warna selang-seling
            if ($row % 2 == 0) {
                $sheet->getStyle("A{$row}:I{$row}")
                    ->getFill()
                    ->setFillType(Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('F8F9FA');
            }

            $row++;
        }

        // Border seluruh data
        $sheet->getStyle('A3:I' . ($row - 1))
            ->getBorders()->getAllBorders()
            ->setBorderStyle(Border::BORDER_THIN);

        // Auto width tiap kolom
        foreach (range('A', 'I') as $column) {
            $sheet->getColumnDimension($column)->setAutoSize(true);
        }

        // Buat file Excel
        $writer = new Xlsx($spreadsheet);
        $filename = 'data_pengajuan_' . date('Y-m-d') . '.xlsx';

        // Output ke browser
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit();
    }
}
