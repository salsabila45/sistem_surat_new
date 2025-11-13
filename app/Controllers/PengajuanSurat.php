<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\JenisSuratModel;
use App\Models\LampiranPengajuanModel;
use App\Models\PengajuanModel;
use App\Models\UserModel;
use App\Models\WargaModel;
use CodeIgniter\HTTP\ResponseInterface;
use Dompdf\Dompdf;
use Dompdf\Options;

class PengajuanSurat extends BaseController
{

    public function index()
    {
        $dataWarga = $this->wargaModel->find($this->user['id']);
        $jenisSurat = $this->jenisSuratModel->findAll();
        return view('pages/masyarakat/pengajuan_surat/form_tambah', [
            'user' => $this->user,
            'jenisSurat' => $jenisSurat,
            'dataWarga' => $dataWarga,
            'siteLogo' => $this->getSiteLogo(),
            'siteName' => $this->getSiteName(),
            'halamanIni' => $this->getHalamanIni($this->currentUrl),
            'sidebarMenu' => $this->menuModel->where('role', $this->user['role'])->where('is_active', 1)->findAll(),
        ]);
    }

    public function admin_index()
    {
        // Ambil parameter filter dari GET
        $noSurat = $this->request->getGet('no_surat');
        $jenisSuratId = $this->request->getGet('jenis_surat_id');
        $status = $this->request->getGet('status');
        $tanggalMulai = $this->request->getGet('tanggal_mulai');
        $tanggalSelesai = $this->request->getGet('tanggal_selesai');

        // Ambil nomor halaman saat ini (default 1)
        $page = (int) ($this->request->getVar('page') ?? 1);
        $perPage = 12; // jumlah data per halaman

        // Query dasar
        $builder = $this->pengajuanModel;

        // Filter dinamis
        if ($noSurat) {
            $builder->like('no_surat', $noSurat);
        }

        if ($jenisSuratId) {
            $builder->where('jenis_surat_id', $jenisSuratId);
        }

        if ($status) {
            $builder->where('status', $status);
        }

        if ($tanggalMulai && $tanggalSelesai) {
            $builder->where('tanggal_pengajuan >=', $tanggalMulai);
            $builder->where('tanggal_pengajuan <=', $tanggalSelesai);
        } elseif ($tanggalMulai) {
            $builder->where('tanggal_pengajuan >=', $tanggalMulai);
        } elseif ($tanggalSelesai) {
            $builder->where('tanggal_pengajuan <=', $tanggalSelesai);
        }

        // Ambil data dengan pagination
        $pengajuanSurat = $builder
            ->orderBy('tanggal_pengajuan', 'DESC')
            ->paginate($perPage, 'pengajuan_surat');

        // Ambil semua jenis surat buat dropdown
        $jenisSuratList = $this->jenisSuratModel->findAll();

        return view('pages/admin/pengajuan_surat/index', [
            'user' => $this->user,
            'pengajuanSurat' => $pengajuanSurat,
            'jenisSuratList' => $jenisSuratList,
            'pager' => $this->pengajuanModel->pager, // penting!
            'filters' => [
                'no_surat' => $noSurat,
                'jenis_surat_id' => $jenisSuratId,
                'status' => $status,
                'tanggal_mulai' => $tanggalMulai,
                'tanggal_selesai' => $tanggalSelesai,
            ],
            'siteLogo' => $this->getSiteLogo(),
            'siteName' => $this->getSiteName(),
            'halamanIni' => $this->getHalamanIni($this->currentUrl),
            'sidebarMenu' => $this->menuModel->where('role', $this->user['role'])->where('is_active', 1)->findAll(),
        ]);
    }


    public function admin_detail($id)
    {
        $pengajuan = $this->pengajuanModel->find($id);

        if (!$pengajuan) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Data pengajuan dengan ID $id tidak ditemukan");
        }

        $jenisSurat = $this->jenisSuratModel->find($pengajuan['jenis_surat_id']);

        $lampiran = $this->lampiranModel->where('pengajuan_id', $id)->findAll();

        $dataWarga = $this->wargaModel->find($this->user['id']);

        return view('pages/admin/pengajuan_surat/detail/index', [
            'user' => $this->user,
            'warga' => $dataWarga,
            'pengajuan' => $pengajuan,
            'jenisSurat' => $jenisSurat,
            'lampiran' => $lampiran ?? [],
            'siteLogo' => $this->getSiteLogo(),
            'siteName' => $this->getSiteName(),
            'halamanIni' => $this->getHalamanIni($this->currentUrl),
            'sidebarMenu' => $this->menuModel->where('role', $this->user['role'])->where('is_active', 1)->findAll(),
        ]);
    }


    public function simpan()
    {
        $data = [
            'warga_id'          => $this->request->getPost('warga_id'),
            'nama'              => $this->request->getPost('nama'),
            'nik'               => $this->request->getPost('nik'),
            'alamat'            => $this->request->getPost('alamat'),
            'keperluan'         => $this->request->getPost('keperluan'),
            'jenis_surat_id'    => $this->request->getPost('jenis_surat_id'),
            'tanggal_pengajuan' => date('Y-m-d'),
            'status'            => 'diajukan',
        ];

        // Ambil data jenis surat
        $jenisSurat = $this->jenisSuratModel->where('id', $data['jenis_surat_id'])->first();
        $no_surat = $this->pengajuanModel->generateNoSurat(); // bisa ditambah param prefix
        $data['no_surat'] = $no_surat;
        $data['jenis_surat'] = $jenisSurat['nama'];

        // Simpan pengajuan surat ke database
        if ($this->pengajuanModel->insert($data)) {
            $pengajuanId = $this->pengajuanModel->getInsertID();

            // Panggil upload lampiran (jika ada)
            $this->uploadLampiranInternal($pengajuanId);

            return redirect()->back()->with('success', 'Pengajuan surat dan lampiran berhasil dikirim!');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data pengajuan surat.');
        }
    }

    private function uploadLampiranInternal($pengajuanId)
    {
        $files = $this->request->getFiles();

        if (isset($files['lampiran']) && count($files['lampiran']) > 0) {
            // Pastikan folder tujuan ada
            $uploadPath = WRITEPATH . 'uploads/lampiran/';

            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            foreach ($files['lampiran'] as $file) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
                    $file->move($uploadPath, $newName);

                    $this->lampiranModel->insert([
                        'pengajuan_id' => $pengajuanId,
                        'nama_file'    => $file->getClientName(),
                        // simpan path relatif ke WRITEPATH (bukan public)
                        'path_file'    => 'uploads/lampiran/' . $newName,
                        'tipe_file'    => $file->getClientMimeType(),
                        'ukuran_file'  => $file->getSizeByUnit('kb'),
                    ]);
                }
            }
        }
    }

    public function riwayat()
    {
        // Ambil query parameter dari URL
        $noSurat = $this->request->getGet('no_surat');
        $jenisSuratId = $this->request->getGet('jenis_surat_id');
        $page = $this->request->getGet('page_riwayat') ?? 1; // Get current page for pagination

        $jenisSurat = $this->jenisSuratModel->findAll();

        // Mulai query dasar
        $builder = $this->pengajuanModel->select('*')->orderBy('created_at', 'DESC');

        // Filter berdasarkan no_surat jika ada
        if (!empty($noSurat)) {
            $builder->like('no_surat', $noSurat);
        }

        // Filter berdasarkan jenis_surat jika ada
        if (!empty($jenisSuratId)) {
            $builder->where('jenis_surat_id', $jenisSuratId);
        }

        $builder->where('warga_id', $this->user['id']);

        // Gunakan paginate() instead of findAll()
        $riwayat = $builder->paginate(12, 'riwayat', $page);
        $pager = $builder->pager;

        // Jika kamu mau tampilkan dalam view:
        return view('pages/masyarakat/riwayat_pengajuan/index', [
            'riwayat' => $riwayat,
            'pager' => $pager, // Pass pager to view
            'user' => $this->user ?? null,
            'filter_no_surat' => $noSurat,
            'filter_jenis_surat' => $jenisSuratId,
            'jenisSurat' => $jenisSurat,
            'siteLogo' => $this->getSiteLogo(),
            'siteName' => $this->getSiteName(),
            'halamanIni' => $this->getHalamanIni($this->currentUrl),
            'sidebarMenu' => $this->menuModel->where('role', $this->user['role'])->where('is_active', 1)->findAll(),
        ]);
    }

    public function hapus($id)
    {
        $pengajuan = $this->pengajuanModel->find($id);

        if (!$pengajuan) {
            return redirect()->back()->with('error', 'Data pengajuan surat tidak ditemukan.');
        }

        // Hapus data
        if ($this->pengajuanModel->delete($id)) {
            return redirect()->back()->with('success', 'Riwayat pengajuan surat berhasil dihapus.');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus riwayat pengajuan surat.');
        }
    }

    public function admin_edit($id)
    {
        $dataPengajuan = $this->pengajuanModel->find($id);
        $jenisSurat = $this->jenisSuratModel->find($dataPengajuan['jenis_surat_id']);
        $dataWarga = $this->wargaModel->find($this->user['id']);
        $kopSurat = $this->kopSuratModel->find(1);

        return view('pages/admin/pengajuan_surat/form_edit.php', [
            'jenisSurat' => $jenisSurat,
            'user' => $this->user,
            'dataPengajuan' => $dataPengajuan,
            'dataWarga' => $dataWarga,
            'kopSurat' => $kopSurat,
            'siteLogo' => $this->getSiteLogo(),
            'siteName' => $this->getSiteName(),
            'halamanIni' => $this->getHalamanIni($this->currentUrl),
            'sidebarMenu' => $this->menuModel->where('role', $this->user['role'])->where('is_active', 1)->findAll(),
        ]);
    }

    public function ubahStatus($id)
    {
        $statusBaru = $this->request->getPost('status');
        $pengajuan = $this->pengajuanModel->find($id);
        if (!$pengajuan) {
            return redirect()->back()->with('error', 'Data pengajuan tidak ditemukan.');
        }

        $dataUpdate = ['status' => $statusBaru];

        if ($statusBaru === 'selesai') {
            $dataUpdate['tanggal_selesai'] = date('Y-m-d');
        }

        $redirectRoute =  '';

        if ($statusBaru == 'verifikasi') {
            $redirectRoute = '/admin/pengajuan-surat/' . $id . '/edit';
        } else if ($statusBaru == 'selesai') {
            $redirectRoute = 'admin/pengajuan-surat';
        } else if ($statusBaru == 'ditolak') {
            $redirectRoute = '/admin/pengajuan-surat/' . $id;
        }

        if ($this->pengajuanModel->update($id, $dataUpdate)) {
            return redirect()->to($redirectRoute)->with('success', 'Status pengajuan berhasil diperbarui.');
        } else {
            return redirect()->back()->with('error', 'Gagal memperbarui status pengajuan.');
        }
    }

    public function updateSurat($id)
    {
        $judul       = $this->request->getPost('judul');
        $noSurat     = $this->request->getPost('no_surat');
        $contentSurat = $this->request->getPost('content_surat');
        $kopSurat = kop_surat();

        // pastikan data pengajuan ada
        $pengajuan = $this->pengajuanModel->find($id);
        if (!$pengajuan) {
            return redirect()->back()->with('error', 'Data pengajuan tidak ditemukan.');
        }
        // generate isi surat
        $html = "
            <html>
            <head>
                <style>
                    body {
                        padding: 2rem;
                    }
                    #judul_surat {
                        text-align: center;
                        text-decoration: underline; 
                        font-size: 1.3rem;
                        margin: 24px 0 6px 0;
                    }
                    #no_surat {
                        font-size: 1rem;
                        text-align: center;
                    }
                    table {
                        width: 100%; 
                        border-collapse: 
                        collapse; border: none;
                    }
                    td {
                        border: none;
                    }
                </style>
            </head>
            <body>
                <div>
                    $kopSurat
                    $contentSurat
                </div>
            </body>
            </html>
        ";

        // setup dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // buat folder jika belum ada
        $path = WRITEPATH . 'uploads/surat/';
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        // simpan file
        $pdfFileName = 'surat_' . $id . '_' . time() . '.pdf';
        $pdfFilePath = $path . $pdfFileName;
        file_put_contents($pdfFilePath, $dompdf->output());

        // update data pengajuan
        $this->pengajuanModel->update($id, [
            'no_surat'   => $noSurat,
            'nama'       => $judul,
            'file_surat' => 'uploads/surat/' . $pdfFileName,
            'status'     => 'selesai',
            'diarsipkan' => 1,
            'nik' => censorNik($pengajuan['nik']),
            'tanggal_selesai' => date('Y-m-d')
        ]);

        return redirect()->to(base_url('admin/pengajuan-surat/' . $id))
            ->with('success', 'Surat berhasil diperbarui dan PDF telah dibuat.');
    }

    public function download($id)
    {
        $surat = $this->pengajuanModel->find($id);

        if (!$surat) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Surat tidak ditemukan');
        }

        $filePath = WRITEPATH  . $surat['file_surat'];

        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'File surat tidak ditemukan.');
        }

        return $this->response->download($filePath, null);
    }

    public function download_lampiran($path)
    {
        helper('filesystem');

        // Base path lokasi file sebenarnya
        $basePath = WRITEPATH . 'uploads/lampiran/';

        // Bersihkan nama file dari path database (ambil nama akhirnya aja)
        $safeFile = basename($path);

        // Gabungkan jadi path lengkap
        $fullPath = $basePath . $safeFile;

        // Cek file ada atau nggak
        if (!file_exists($fullPath)) {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }

        // Ambil nama file untuk nama saat di-download
        $fileName = basename($fullPath);

        // Kembalikan file untuk diunduh
        return $this->response->download($fullPath, null)->setFileName($fileName);
    }
}
