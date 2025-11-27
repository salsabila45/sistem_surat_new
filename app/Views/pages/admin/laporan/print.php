<!-- app/Views/print/warga_pdf.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Surat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
        }

        .container {
            margin: 0 auto;
            width: 95%;
        }
    </style>
</head>

<body onload="window.print()">
    <div class="container">
        <div style="position: relative; width: 100%; border-bottom: 2px solid black; height: 80px; text-align: center;">
            <!-- Logo kiri -->
            <img src="/uploads/desa/<?= $kopSurat['logo'] ?>"
                alt=""
                style="position: absolute; left: 0; top: 0px; width: 70px; height: 70px; object-fit: cover;">

            <!-- Teks tengah -->
            <div style="display: inline-block; margin: 0 auto; text-align: center;">
                <h2 style="font-size: 1.4rem; font-weight: bold; text-transform: uppercase; margin: 0;">
                    <?= $kopSurat['nama_instansi'] ?>
                </h2>
                <h3 style="font-size: 1.1rem; font-weight: 600; text-transform: uppercase; margin: 2px 0;">
                    Kecamatan <?= $kopSurat['kecamatan'] ?> DESA <?= $kopSurat['desa'] ?>
                </h3>
                <p style="font-size: 1rem; margin: 0;">
                    <?= $kopSurat['alamat'] ?>, Kode Pos <?= $kopSurat['kode_pos'] ?>
                </p>
            </div>

            <!-- Logo kanan transparan untuk menjaga keseimbangan visual -->
            <img src=""
                alt=""
                style="position: absolute; right: 0; top: 10px; width: 70px; height: 70px; opacity: 0;">
        </div>

        <h2>Laporan Pengajuan Surat</h2>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Surat</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Jenis Surat</th>
                    <th>Keperluan</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Tanggal Selesai</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($pengajuanSurat)) : ?>
                    <?php $no = 1; ?>
                    <?php foreach ($pengajuanSurat as $row) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= esc($row['no_surat']) ?></td>
                            <td><?= esc($row['nik']) ?></td>
                            <td><?= esc($row['nama']) ?></td>
                            <td><?= esc($row['jenis_surat']) ?></td>
                            <td><?= esc($row['keperluan']) ?></td>
                            <td><?= date('d-m-Y', strtotime($row['tanggal_pengajuan'])) ?></td>
                            <td><?= $row['tanggal_selesai'] ? date('d-m-Y', strtotime($row['tanggal_selesai'])) : '-' ?></td>
                            <td><?= esc(ucfirst($row['status'])) ?></td>
                        </tr>
                    <?php endforeach ?>
                <?php else : ?>
                    <tr>
                        <td colspan="11" style="text-align:center;">Tidak ada data arsip surat</td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
    </div>
</body>

</html>