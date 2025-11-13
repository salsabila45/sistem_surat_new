<?= $this->extend('layouts/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class=" w-full px-6 py-6 mx-auto">
    <div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl">
            <div class="flex items-center justify-between mb-2">
                <h6 class="mb-4">Jenis Surat</h6>
            </div>
            <div class="w-full flex flex-col md:flex-row! mb-4 gap-3">
                <form method="get" action="<?= base_url('admin/jenis-surat/search') ?>" class="w-full md:w-3/5 flex justify-start" style="gap: .8rem;">
                    <div style="max-width: 20rem;" class="relative flex flex-1 flex-wrap items-stretch transition-all rounded-lg ease">
                        <input name="keyword"
                            value="<?= esc($keyword ?? '') ?>" type="text" class="pl-9 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850  bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Cari kode atau nama surat...">
                        <span class="text-sm ease leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                            <i class="fas fa-search" aria-hidden="true"></i>
                        </span>
                    </div>
                    <button type="submit" onclick="window.location='<?= base_url('admin/data-warga') ?>'"
                        class="inline-block px-6 py-3 font-bold text-center text-blue-500 uppercase align-middle transition-all bg-transparent border border-blue-500 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md">
                        Cari
                    </button>
                </form>
                <div class="w-full md:w-2/5! flex justify-end items-center">
                    <a href="/admin/jenis-surat/tambah" style="height: -webkit-fill-available;" class="w-full md:w-max! inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-blue-500 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md">Tambah Jenis</a>
                </div>
            </div>
        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
            <div class="p-0 overflow-x-auto">
                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                    <thead class="align-bottom">
                        <tr>
                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
                            <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Kode Surat</th>
                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Surat</th>
                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Deskripsi</th>
                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status</th>
                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal Update</th>
                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Aksi</th>
                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Template</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jenisSurat as $index => $jenisSurat): ?>
                            <tr>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <div class="flex px-2 py-1">
                                        <h6 class="mb-0 leading-normal text-sm"><?= $index + 1 ?></h6>
                                    </div>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-xs"><?= $jenisSurat['kode'] ?></p>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-xs"><?= $jenisSurat['nama'] ?></p>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-xs"><?= $jenisSurat['deskripsi'] ?></p>
                                </td>
                                <td class="p-2 leading-normal text-center align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                                    <?php if ($jenisSurat['status'] == 'aktif') : ?>
                                        <span class="py-1.4 px-2.5 text-xs rounded-1.8 inline-block whitespace-nowrap text-center bg-gradient-to-tl from-emerald-500 to-teal-400 align-baseline font-bold uppercase leading-none text-white"><?= $jenisSurat['status'] ?></span>
                                    <?php else : ?>
                                        <span class="py-1.4 px-2.5 text-xs rounded-1.8 inline-block whitespace-nowrap text-center bg-gradient-to-tl from-red-600 to-orange-600 align-baseline font-bold uppercase leading-none text-white"><?= $jenisSurat['status'] ?></span>
                                    <?php endif; ?>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-xs"><?= $jenisSurat['updated_at'] ?></p>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <a href="<?= base_url('admin/jenis-surat/edit/' . $jenisSurat['id']) ?>" class="mr-1 inline-block px-4 py-2 font-bold text-center bg-gradient-to-tl from-blue-500 to-violet-500 uppercase align-middle transition-all rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md text-white">Edit</a>
                                    <a href="<?= base_url('admin/jenis-surat/hapus/' . $jenisSurat['id']) ?>" class="mr-1 inline-block px-4 py-2 font-bold text-center bg-gradient-to-tl from-red-600 to-orange-600 uppercase align-middle transition-all rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md text-white">Hapus</a>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <a href="<?= base_url('admin/jenis-surat/' . $jenisSurat['id']) . '/template' ?>" class="mr-3 inline-block px-4 py-2 font-bold text-center bg-slate-700 uppercase align-middle transition-all rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md text-white">Template</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-4 mb-6!" style="width: max-content; margin: auto;">
                <?php if ($pager->getPageCount() > 0): ?>
                    <?= $pager->links('jenis_surat', 'tailwind_pagination') ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>