<?= $this->extend('layouts/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class="w-full px-6 py-6 mx-auto">
    <div class="flex flex-wrap mt-6 -mx-3">
        <div class="w-full max-w-full px-2 mt-0 lg:w-2/3 lg:flex-none">
            <div>
                <div class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                    <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                        <h6 class="mb-4 font-semibold">Data Surat</h6>

                        <!-- Tambahkan wrapper untuk responsivitas -->
                        <div class="overflow-x-auto w-full">
                            <table class="min-w-full border-collapse">
                                <tbody>
                                    <tr>
                                        <td class="py-2 pr-3 font-semibold whitespace-nowrap">No Surat</td>
                                        <td class="py-2 pr-3">:</td>
                                        <td class="py-2 pr-3"><?= esc($jenisSurat['kode']) ?></td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 pr-3 font-semibold whitespace-nowrap">Nama Surat</td>
                                        <td class="py-2 pr-3">:</td>
                                        <td class="py-2 pr-3"><?= esc($jenisSurat['nama']) ?></td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 pr-3 font-semibold whitespace-nowrap">Deskripsi Surat</td>
                                        <td class="py-2 pr-3">:</td>
                                        <td class="py-2 pr-3"><?= esc($jenisSurat['deskripsi']) ?></td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 pr-3 font-semibold whitespace-nowrap">Persyaratan Surat</td>
                                        <td class="py-2 pr-3">:</td>
                                        <td class="py-2 pr-3"><?= esc($jenisSurat['persyaratan']) ?></td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 pr-3 font-semibold whitespace-nowrap">Keperluan</td>
                                        <td class="py-2 pr-3">:</td>
                                        <td class="py-2 pr-3"><?= esc($pengajuan['keperluan']) ?></td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 pr-3 font-semibold whitespace-nowrap">Status</td>
                                        <td class="py-2 pr-3">:</td>
                                        <td class="p-2 leading-normal text-left align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                                            <?php if ($pengajuan['status'] == 'selesai') : ?>
                                                <span class="py-1.4 px-2.5 text-xs rounded-1.8 inline-block text-center bg-gradient-to-tl from-emerald-500 to-teal-400 font-bold uppercase leading-none text-white"><?= esc($pengajuan['status']) ?></span>
                                            <?php elseif ($pengajuan['status'] == 'diajukan') : ?>
                                                <span class="py-1.4 px-2.5 text-xs rounded-1.8 inline-block text-center bg-gradient-to-tl from-blue-700 to-cyan-500 font-bold uppercase leading-none text-white"><?= esc($pengajuan['status']) ?></span>
                                            <?php elseif ($pengajuan['status'] == 'verifikasi') : ?>
                                                <span class="py-1.4 px-2.5 text-xs rounded-1.8 inline-block text-center bg-gradient-to-tl from-orange-500 to-yellow-500 font-bold uppercase leading-none text-white"><?= esc($pengajuan['status']) ?></span>
                                            <?php elseif ($pengajuan['status'] == 'ditolak') : ?>
                                                <span class="py-1.4 px-2.5 text-xs rounded-1.8 inline-block text-center bg-gradient-to-tl from-red-600 to-orange-600 font-bold uppercase leading-none text-white"><?= esc($pengajuan['status']) ?></span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-2 pr-3 font-semibold whitespace-nowrap">Lampiran</td>
                                        <td class="py-2 pr-3">:</td>
                                        <td class="py-2 pr-3 flex flex-wrap gap-4">
                                            <?php foreach ($lampiran as $item): ?>
                                                <a href="/lampiran/download/<?= esc(basename($item['path_file'])) ?>" class="underline text-blue-600! hover:text-blue-800">
                                                    <?= esc($item['nama_file']) ?>
                                                </a>
                                            <?php endforeach ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <div class="mt-4 mb-4"></div>

                <div class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                    <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                        <h6 class="mb-4 font-semibold">Data Pengajuan</h6>
                        <table>
                            <tbody>
                                <tr>
                                    <td class="py-2 pr-3 font-semibold">NIK</td>
                                    <td class="py-2 pr-3">:</td>
                                    <td class="py-2 pr-3"><?= $pengajuan['nik'] ?></td>
                                </tr>
                                <tr>
                                    <td class="py-2 pr-3 font-semibold">Nama Lengkap</td>
                                    <td class="py-2 pr-3">:</td>
                                    <td class="py-2 pr-3"><?= $pengajuan['nama'] ?></td>
                                </tr>
                                <tr>
                                    <td class="py-2 pr-3 font-semibold">Alamat</td>
                                    <td class="py-2 pr-3">:</td>
                                    <td class="py-2 pr-3"><?= $pengajuan['alamat'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full max-w-full px-2 lg:w-1/3 lg:flex-none mt-4 lg:mt-0">
            <div class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-4">
                    <h6 class="capitalize ">Pengesahan Surat</h6>
                    <?php if ($pengajuan['status'] !== 'selesai') : ?>
                        <div class="flex" style="gap: .8rem;">
                            <form action="<?= base_url('/admin/pengajuan-surat/' . $pengajuan['id'] . '/ubah-status') ?>" class="flex-1 mt-4" method="post">
                                <input type="hidden" name="status" value="verifikasi">
                                <button type="submit" class="w-full inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all bg-blue-500 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md">Setujui dan Tinjau</button>
                            </form>
                            <form action="<?= base_url('/admin/pengajuan-surat/' . $pengajuan['id'] . '/ubah-status') ?>" class="flex-1 mt-4" method="post">
                                <input type="hidden" name="status" value="ditolak">
                                <button type="submit" class="w-full inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all bg-blue-500 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-gradient-to-tl from-red-600 to-orange-600 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md">Tolak</button>
                            </form>
                        </div>
                    <?php elseif ($pengajuan['status'] == 'selesai') : ?>
                        <a href="<?= base_url('surat/download/' . $pengajuan['id']) ?>" class="w-full inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all bg-blue-500 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md">Cetak File</a>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>