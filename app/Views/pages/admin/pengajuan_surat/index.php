<?= $this->extend('layouts/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class="w-full px-4 md:px-6! py-6 mx-auto">
    <div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
        <div class="p-4 md:p-6! pb-0 mb-0 bg-white rounded-t-2xl">
            <div class="flex items-center justify-between mb-2">
                <h6 class="mb-4">Daftar Pengajuan Surat</h6>
            </div>
            <form method="get" action="<?= base_url('admin/pengajuan-surat')  ?>" class="w-full">
                <div class="w-full flex flex-col lg:flex-row justify-between gap-3 mb-4">
                    <div class="flex w-full xl:w-1/5! justify-start" style="gap: .8rem;">
                        <div class="relative flex flex-1 flex-wrap items-stretch transition-all rounded-lg ease">
                            <input name="no_surat" value="<?= esc($filters['no_surat'] ?? '') ?>" type="text" class="pl-9 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850  bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Cari No Surat...">
                            <span class="text-sm ease leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                                <i class="fas fa-search" aria-hidden="true"></i>
                            </span>
                        </div>
                        <button type="submit" class="inline-block px-6 py-3 font-bold text-center text-blue-500 uppercase align-middle transition-all bg-transparent border border-blue-500 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md">Cari</button>
                    </div>

                    <div class="flex flex-col lg:flex-row w-full xl:w-3/5! justify-end" style="gap: 0.6rem;">
                        <div class="flex flex-col md:flex-row! gap-3">
                            <select name="jenis_surat_id" class="flex-1 text-sm focus:shadow-primary-outline leading-5.6 ease block rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow">
                                <option value="">Semua Jenis</option>
                                <?php foreach ($jenisSuratList as $jenisSurat): ?>
                                    <option value="<?= $jenisSurat['id'] ?>" <?= ($filters['jenis_surat_id'] ?? '') == $jenisSurat['id'] ? 'selected' : '' ?>><?= $jenisSurat['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <select name="status" class="flex-1 text-sm focus:shadow-primary-outline leading-5.6 ease block rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow">
                                <option value="">Semua Status</option>
                                <option value="diajukan" <?= ($filters['status'] == 'diajukan') ? 'selected' : '' ?>>Diajukan</option>
                                <option value="verifikasi" <?= ($filters['status'] == 'verifikasi') ? 'selected' : '' ?>>Verifikasi</option>
                                <option value="selesai" <?= ($filters['status'] == 'selesai') ? 'selected' : '' ?>>Selesai</option>
                            </select>
                        </div>
                        <div class="hidden xl:flex! gap-3">
                            <input type="date" name="tanggal_mulai" value="<?= esc($filters['tanggal_mulai'] ?? '') ?>" class="flex-1 focus:shadow-primary-outline text-sm leading-5.6 ease block appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                            <input type="date" name="tanggal_selesai" value="<?= esc($filters['tanggal_selesai'] ?? '') ?>" class="flex-1 focus:shadow-primary-outline text-sm leading-5.6 ease block appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none">
                        </div>
                        <div class="flex gap-3">
                            <button type="submit" class="flex-1 inline-block px-6 py-3 font-bold text-center text-blue-500 uppercase align-middle transition-all bg-transparent border border-blue-500 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md">Terapkan</button>
                            <a href="/admin/pengajuan-surat<?= $filters['no_surat'] ? '?no_surat=' . $filters['no_surat']  : ''  ?>" class="flex-1 inline-block px-6 py-3 font-bold text-center text-blue-500 uppercase align-middle transition-all bg-transparent border border-blue-500 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md">Reset</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
            <div class="p-0 overflow-x-auto">
                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500 px-6">
                    <div class="px-6 py-1">
                        <?= view('components/alert') ?>
                    </div>
                    <thead class="align-bottom">
                        <tr>
                            <th class="py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No Surat</th>
                            <th class="py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Pemohon</th>
                            <th class="py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Jenis Surat</th>
                            <th class="py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Pengajuan</th>
                            <th class="py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Selesai</th>
                            <th class="py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status</th>
                            <th class="py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pengajuanSurat as $index => $pengajuan): ?>
                            <tr>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <div class="flex px-2 py-1">
                                        <h6 class="mb-0 leading-normal text-sm"><?= $pengajuan['no_surat'] ?></h6>
                                    </div>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-xs"><?= $pengajuan['nama'] ?></p>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-xs"><?= $pengajuan['jenis_surat'] ?></p>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-xs"><?= $pengajuan['tanggal_pengajuan'] ?></p>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-xs"><?= $pengajuan['tanggal_selesai'] ?? '-' ?></p>
                                </td>
                                <td class="p-2 leading-normal text-left align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                                    <?php if ($pengajuan['status'] == 'selesai') : ?>
                                        <span class="py-1.4 px-2.5 text-xs rounded-1.8 inline-block whitespace-nowrap text-center bg-gradient-to-tl from-emerald-500 to-teal-400 align-baseline font-bold uppercase leading-none text-white"><?= $pengajuan['status'] ?></span>
                                    <?php elseif ($pengajuan['status'] == 'diajukan') : ?>
                                        <span class="py-1.4 px-2.5 text-xs rounded-1.8 inline-block whitespace-nowrap text-center bg-gradient-to-tl from-blue-700 to-cyan-500 align-baseline font-bold uppercase leading-none text-white"><?= $pengajuan['status'] ?></span>
                                    <?php elseif ($pengajuan['status'] == 'verifikasi') : ?>
                                        <span class="py-1.4 px-2.5 text-xs rounded-1.8 inline-block whitespace-nowrap text-center bg-gradient-to-tl from-orange-500 to-yellow-500 align-baseline font-bold uppercase leading-none text-white"><?= $pengajuan['status'] ?></span>
                                    <?php elseif ($pengajuan['status'] == 'ditolak') : ?>
                                        <span class="py-1.4 px-2.5 text-xs rounded-1.8 inline-block whitespace-nowrap text-center bg-gradient-to-tl from-red-600 to-orange-600 align-baseline font-bold uppercase leading-none text-white"><?= $pengajuan['status'] ?></span>
                                    <?php endif; ?>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <a href="<?= base_url('admin/pengajuan-surat/' . $pengajuan['id']) ?>" class="mr-1 inline-block px-4 py-2 font-bold text-center bg-blue-500 uppercase align-middle transition-all rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md text-white">Detail</a>
                                    <a href="<?= base_url('admin/pengajuan-surat/' . $pengajuan['id'] . '/hapus') ?>" class="mr-1 inline-block px-4 py-2 font-bold text-center bg-gradient-to-tl from-red-600 to-orange-600 uppercase align-middle transition-all rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md text-white">Hapus</a>
                                    <?php if ($pengajuan['status'] == 'selesai') : ?>
                                        <a href="<?= base_url('surat/download/' . $pengajuan['id']) ?>" class="mr-1 inline-block px-4 py-2 font-bold text-center bg-gradient-to-tl from-blue-500 to-violet-500  uppercase align-middle transition-all rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md text-white">Cetak</a>
                                    <?php else : ?>
                                        <button disabled class="mr-1 inline-block px-4 py-2 font-bold text-center bg-slate-300!  uppercase align-middle transition-all rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md text-white">Cetak</button>
                                    <?php endif ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-4 mb-6!" style="width: max-content; margin: auto;">
                <?php if ($pager->getPageCount() > 0): ?>
                    <?= $pager->links('pengajuan_surat', 'tailwind_pagination') ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>