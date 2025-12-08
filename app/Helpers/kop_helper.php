<?php
// app/Helpers/kop_helper.php

use App\Models\KopSuratModel;
use App\Models\SysConfigModel;

if (! function_exists('kop_surat')) {
    function kop_surat(): string
    {
        $kopSuratModel = new KopSuratModel();
        $kopSurat = $kopSuratModel->find(1);
        $logoDesa = $kopSurat['logo'];
        $namaInstansi = $kopSurat['nama_instansi'];
        $namaKecamatan = $kopSurat['kecamatan'];
        $namaDesa = $kopSurat['desa'];
        $alamat = $kopSurat['alamat'];
        $kodePos = $kopSurat['kode_pos'];

        return '
             <div style="position: relative; width: 100%; border-bottom: 2px solid black; height: 80px; text-align: center;">
                <!-- Logo kiri -->
                <img src="https://layanan-surat-desa-gambarsari.up.railway.app/uploads/desa/' . $logoDesa . '"
                    alt=""
                    style="position: absolute; left: 0; top: 0px; width: 70px; height: 70px; object-fit: cover;">

                <!-- Teks tengah -->
                <div style="display: inline-block; margin: 0 auto; text-align: center;">
                    <h2 style="font-size: 1.4rem; font-weight: bold; text-transform: uppercase; margin: 0;">
                        ' . $namaInstansi . '
                    </h2>
                    <h3 style="font-size: 1.1rem; font-weight: 600; text-transform: uppercase; margin: 2px 0;">
                        Kecamatan ' . $namaKecamatan . ', DESA ' . $namaDesa . '
                    </h3>
                    <p style="font-size: 1rem; margin: 0;">
                        ' . $alamat . ' Kode Pos ' . $kodePos . '
                    </p>
                </div>

                <!-- Logo kanan transparan untuk menjaga keseimbangan visual -->
                <img src=""
                    alt=""
                    style="position: absolute; right: 0; top: 10px; width: 70px; height: 70px; opacity: 0;">
            </div>
        ';
    }
}
