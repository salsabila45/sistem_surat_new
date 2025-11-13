<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ArsipSurat extends BaseController
{
    public function index()
    {
        // Ambil input filter & pencarian
        $keyword = $this->request->getVar('keyword');
        $filterJenis = $this->request->getVar('jenis_surat');

        // Query dasar: hanya surat yang diarsipkan
        $query = $this->pengajuanModel
            ->where('diarsipkan', true)
            ->orderBy('tanggal_pengajuan', 'DESC');

        // Tambahkan pencarian jika ada
        if (!empty($keyword)) {
            $query->groupStart()
                ->like('no_surat', $keyword)
                ->orLike('nama', $keyword)
                ->groupEnd();
        }

        // Tambahkan filter jenis surat
        if (!empty($filterJenis)) {
            $query->where('jenis_surat_id', $filterJenis);
        }

        // Ambil data
        $dataArsip = $query->paginate(12, 'arsip');
        $pager = $this->pengajuanModel->pager;
        $jenisSuratList = $this->jenisSuratModel->findAll();

        $data = [
            'dataArsip' => $dataArsip,
            'pager' => $pager,
            'jenisSuratList' => $jenisSuratList,
            'keyword' => $keyword,
            'filterJenis' => $filterJenis,
            'user' => $this->user,
            'siteLogo' => $this->getSiteLogo(),
            'siteName' => $this->getSiteName(),
            'halamanIni' => $this->getHalamanIni($this->currentUrl),
            'sidebarMenu' => $this->menuModel->where('role', $this->user['role'])->where('is_active', 1)->findAll(),
        ];

        return view('pages/admin/arsip_surat/index', $data);
    }

    public function print_pdf()
    {
        $arsipSurat = $this->pengajuanModel->where('diarsipkan', 1)->findAll();
        $kopSurat = $this->kopSuratModel->find(1);

        return view('pages/admin/arsip_surat/print', [
            'arsipSurat' => $arsipSurat,
            'kopSurat' => $kopSurat,
        ]);
    }

    public function print_excel()
    {
        $dataArsip = $this->pengajuanModel->where('diarsipkan', 1)->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Judul
        $sheet->setCellValue('A1', 'DATA ARSIP SURAT');
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
            'Tanggal Arsip',
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
        $filename = 'data_arsip_' . date('Y-m-d') . '.xlsx';

        // Output ke browser
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit();
    }
}
