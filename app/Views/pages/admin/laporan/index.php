<?= $this->extend('layouts/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class="w-full px-6 py-6 mx-auto">

    <!-- row 1 -->
    <div class="flex flex-wrap -mx-3 mb-4 justify-center">
        <!-- card1 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase  dark:opacity-60">Surat Diajukan</p>
                                <h5 class="mb-2 font-bold "><?= $pengajuan['totalDiajukan'] ?></h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-blue-500 to-violet-500">
                                <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- card2 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase  dark:opacity-60">Pengajuan diproses</p>
                                <h5 class="mb-2 font-bold "><?= $pengajuan['totalVerifikasi'] ?></h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-red-600 to-orange-600">
                                <i class="ni leading-none ni-world text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- card3 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase  dark:opacity-60">Pengajuan Selesai</p>
                                <h5 class="mb-2 font-bold "><?= $pengajuan['totalSelesai'] ?></h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-emerald-500 to-teal-400">
                                <i class="ni leading-none ni-paper-diploma text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- card3 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase  dark:opacity-60">Total Pengajuan</p>
                                <h5 class="mb-2 font-bold "><?= $pengajuan['totalPengajuan'] ?></h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-emerald-500 to-teal-400">
                                <i class="ni leading-none ni-paper-diploma text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- cards row 2 -->
    <div class="flex flex-wrap mt-6 -mx-3">
        <div class="w-full max-w-full px-3 lg:flex-none">
            <div class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl">
                    <div class="flex items-center justify-between mb-2">
                        <h6 class="">Laporan Pengajuan Surat</h6>
                        <div class="hidden md:flex!" style="gap: 6px">
                            <a href="/admin/laporan/print/pdf" class="text-blue-500 text-bold underline">Export PDF</a>
                            |
                            <a href="/admin/laporan/print/excel" class="text-blue-500 underline">Export Excel</a>
                        </div>
                        <a href="" class="text-blue-500 underline md:hidden!">Export</a>
                    </div>
                    <form method="get" action="<?= base_url('admin/laporan')  ?>" class="w-full">
                        <div class="flex flex-col md:flex-row! justify-end" style="gap: 0.6rem;">
                            <select name="periode" class="text-sm focus:shadow-primary-outline leading-5.6 ease block rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow">
                                <option value="">Periode</option>
                                <?php foreach (['harian', 'bulanan', 'tahunan'] as $periode): ?>
                                    <option value="<?= $periode ?>" <?= ($filters['periode'] ?? '') == $periode ? 'selected' : '' ?>><?= ucfirst($periode) ?></option>
                                <?php endforeach; ?>
                            </select>
                            <select name="jenis_surat_id" class="text-sm focus:shadow-primary-outline leading-5.6 ease block rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow">
                                <option value="">Semua Jenis</option>
                                <?php foreach ($jenisSuratList as $jenisSurat): ?>
                                    <option value="<?= $jenisSurat['id'] ?>" <?= ($filters['jenis_surat_id'] ?? '') == $jenisSurat['id'] ? 'selected' : '' ?>><?= $jenisSurat['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="flex gap-3">
                                <button type="submit" class="w-full md:w-max! inline-block px-6 py-3 font-bold text-center text-blue-500 uppercase align-middle transition-all bg-transparent border border-blue-500 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md">Terapkan</button>
                                <a href="/admin/laporan" class="w-full md:w-max! inline-block px-6 py-3 font-bold text-center text-blue-500 uppercase align-middle transition-all bg-transparent border border-blue-500 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md">Reset</a>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="pb-4 overflow-x-auto">
                    <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500 px-6">
                        <thead class="align-bottom">
                            <tr>
                                <?php foreach (['Jenis Surat', 'Diajukan', 'Selesai', 'Verifikasi', 'Arsip', 'Ditolak', 'Total'] as $tabTitle) : ?>
                                    <th class="py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"><?= $tabTitle ?></th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pengajuanSurat as $index => $pengajuan): ?>
                                <tr>
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 font-semibold leading-tight text-xs"><?= $pengajuan['jenis_surat'] ?></p>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 font-semibold leading-tight text-xs"><?= $pengajuan['total_diajukan'] ?></p>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 font-semibold leading-tight text-xs"><?= $pengajuan['total_selesai'] ?></p>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 font-semibold leading-tight text-xs"><?= $pengajuan['total_verifikasi'] ?></p>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 font-semibold leading-tight text-xs"><?= $pengajuan['total_arsip'] ?></p>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 font-semibold leading-tight text-xs"><?= $pengajuan['total_ditolak'] ?></p>
                                    </td>
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <p class="mb-0 font-semibold leading-tight text-xs"><?= $pengajuan['total_pengajuan'] ?></p>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- cards row 3 -->
    <div class="flex flex-wrap mt-6 -mx-3">
        <div class="w-full max-w-full px-3 mt-0 lg:w-8/12 lg:flex-none">
            <div class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                    <h6 class="capitalize ">Persentase Surat (30 hari)</h6>
                </div>
                <div class="flex-auto p-4">
                    <div>
                        <canvas id="chart-pie" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full max-w-full px-3 mt-0 lg:w-4/12 lg:flex-none">
            <div class="border-black/12.5 dark:bg-slate-850 dark:shadow-dark-xl shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                    <h6 class="capitalize ">Grafik Surat (30 hari)</h6>
                </div>
                <div class="flex-auto p-4">
                    <div>
                        <canvas id="chart-bars-laporan" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    const pengajuanSurat = <?= json_encode($pengajuanSurat) ?>;
    const labels = pengajuanSurat.map(item => item.jenis_surat);
    const dataValues = pengajuanSurat.map(item => item.total_pengajuan);
    const totalAjuanPerBulan = <?= json_encode(array_values($totalAjuanPerBulan)) ?>;
</script>
<?= $this->endSection(); ?>