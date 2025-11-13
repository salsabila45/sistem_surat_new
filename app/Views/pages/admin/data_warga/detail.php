<?= $this->extend('layouts/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class="w-full px-6 py-6 mx-auto">
    <div class="flex justify-center items-center mt-6 -mx-3">
        <div class="w-max max-w-full px-2 mt-0 lg:flex-none">
            <div>
                <div class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border pb-4">
                    <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                        <h6 class="mb-4 font-semibold">Data Warga</h6>

                        <!-- Tambahkan wrapper untuk responsivitas -->
                        <div class="overflow-x-auto w-full">
                            <table class="min-w-full border-collapse">
                                <tbody>
                                    <tr>
                                        <td class="py-2 pr-3 font-semibold whitespace-nowrap">NIK</td>
                                        <td class="py-2 pr-3">:</td>
                                        <td class="py-2 pr-3"><?= esc($warga['nik']) ?></td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 pr-3 font-semibold whitespace-nowrap">Nama</td>
                                        <td class="py-2 pr-3">:</td>
                                        <td class="py-2 pr-3"><?= esc($warga['nama_lengkap']) ?></td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 pr-3 font-semibold whitespace-nowrap">Tempat, Tanggal lahir</td>
                                        <td class="py-2 pr-3">:</td>
                                        <td class="py-2 pr-3"><?= esc($warga['tempat_lahir']) ?>, <?= esc($warga['tanggal_lahir']) ?></td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 pr-3 font-semibold whitespace-nowrap">Alamat</td>
                                        <td class="py-2 pr-3">:</td>
                                        <td class="py-2 pr-3"><?= esc($warga['alamat']) ?></td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 pr-3 font-semibold whitespace-nowrap">No Hp</td>
                                        <td class="py-2 pr-3">:</td>
                                        <td class="py-2 pr-3"><?= esc($warga['no_hp']) ?></td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 pr-3 font-semibold whitespace-nowrap">Email</td>
                                        <td class="py-2 pr-3">:</td>
                                        <td class="py-2 pr-3"><?= esc($warga['email']) ?></td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 pr-3 font-semibold whitespace-nowrap">Jenis Kelamin</td>
                                        <td class="py-2 pr-3">:</td>
                                        <td class="py-2 pr-3"><?= esc($warga['jenis_kelamin']) == 'L' ? "Laki Laki" : "Perempuan" ?></td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 pr-3 font-semibold whitespace-nowrap">Agama</td>
                                        <td class="py-2 pr-3">:</td>
                                        <td class="py-2 pr-3"><?= esc($warga['agama']) ?></td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 pr-3 font-semibold whitespace-nowrap">Status</td>
                                        <td class="py-2 pr-3">:</td>
                                        <td class="py-2 pr-3"><?= esc($warga['status']) ?></td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 pr-3 font-semibold whitespace-nowrap">Email</td>
                                        <td class="py-2 pr-3">:</td>
                                        <td class="py-2 pr-3"><?= esc($warga['email']) ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>