<?= $this->extend('layouts/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class=" w-full px-6 py-6 mx-auto">
    <div class="flex flex-wrap -mx-3 mb-4 justify-center">
        <!-- card1 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/3! sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase  dark:opacity-60">Total Warga</p>
                                <h5 class="mb-2 font-bold "><?= $totalWarga ?></h5>
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
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/3! sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase  dark:opacity-60">Aktif</p>
                                <h5 class="mb-2 font-bold "><?= $totalAktif ?></h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-emerald-500 to-teal-400">
                                <i class="ni leading-none ni-world text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- card3 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/3! sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase  dark:opacity-60">Tidak Aktif</p>
                                <h5 class="mb-2 font-bold "><?= $totalNonaktif ?></h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-red-600 to-orange-600">
                                <i class="ni leading-none ni-paper-diploma text-lg relative top-3.5 text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl">
            <div class="flex items-center justify-between mb-2">
                <h6 class="mb-4">Data Warga</h6>
                <div class="flex" style="gap: 6px">
                    <a href="/admin/data-warga/print/pdf" class="text-blue-500 text-bold underline">Export PDF</a>
                    |
                    <a href="/admin/data-warga/print/excel" class="text-blue-500 underline">Export Excel</a>
                </div>
            </div>
            <div class="w-full flex flex-col sm:flex-row! justify-between mb-4">
                <form method="get" action="<?= base_url('admin/data-warga/search') ?>" class="w-full md:w-4/5! lg:w-2/4! flex flex-col sm:flex-row! justify-start" style="gap: .8rem;">
                    <div class="relative flex flex-1! flex-wrap items-stretch transition-all rounded-lg ease">
                        <input name="keyword" value="<?= $keyword ?? '' ?>" type="text" class="pl-9 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 dark:bg-slate-850  bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Cari nama atau nik...">
                        <span class="text-sm ease leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                            <i class="fas fa-search" aria-hidden="true"></i>
                        </span>
                    </div>
                    <input type="text" name="alamat" placeholder="Alamat" class="focus:shadow-primary-outline text-sm leading-5.6 ease block w-full md:w-max! appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"></input>
                    <div class="flex gap-3">
                        <button type="submit" class="flex-1 inline-block px-6 py-3 font-bold text-center text-blue-500 uppercase align-middle transition-all bg-transparent border border-blue-500 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md">Filter</button>
                        <a href="<?= base_url('admin/data-warga') ?>"
                            class="flex-1 inline-block px-6 py-3 font-bold text-center text-blue-500 uppercase align-middle transition-all bg-transparent border border-blue-500 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md">
                            Reset
                        </a>
                    </div>
                </form>
                <a href="/admin/data-warga/tambah" style="height: -webkit-fill-available;" class="mt-3 md:mt-0 inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-blue-500 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md">Tambah</a>
            </div>
        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
            <div class="p-0 overflow-x-auto">
                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                    <thead class="align-bottom">
                        <tr>
                            <th class="pl-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">NIK</th>
                            <th class="py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama Lengkap</th>
                            <th class="py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">TTL</th>
                            <th class="py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Alamat</th>
                            <th class="py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No. Hp</th>
                            <th class="py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Email</th>
                            <th class="py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Jenis Kelamin</th>
                            <th class="py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Agama</th>
                            <th class="py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Status</th>
                            <th class="pr-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataWarga as $warga): ?>
                            <tr>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <div class="flex px-2 py-1">
                                        <h6 class="mb-0 leading-normal text-sm"><?= $warga['nik'] ?></h6>
                                    </div>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-xs"><?= $warga['nama_lengkap'] ?></p>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-xs"><?= $warga['tempat_lahir'] ?>, <?= date( 'd-m-Y', strtotime($warga['tanggal_lahir'])) ?></p>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-xs"><?= $warga['alamat'] ?></p>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-xs"><?= $warga['no_hp'] ?></p>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-xs"><?= $warga['email'] ?></p>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-xs"><?= $warga['jenis_kelamin'] == 'L' ? 'Laki-Laki' : 'Perempuan' ?></p>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-xs"><?= $warga['agama'] ?></p>
                                </td>
                                <td class="p-2 leading-normal text-center align-middle bg-transparent border-b text-sm whitespace-nowrap shadow-transparent">
                                    <?php if ($warga['status'] == 'aktif') : ?>
                                        <span class="py-1.4 px-2.5 text-xs rounded-1.8 inline-block whitespace-nowrap text-center bg-gradient-to-tl from-emerald-500 to-teal-400 align-baseline font-bold uppercase leading-none text-white"><?= $warga['status'] ?></span>
                                    <?php else : ?>
                                        <span class="py-1.4 px-2.5 text-xs rounded-1.8 inline-block whitespace-nowrap text-center bg-gradient-to-tl from-red-600 to-orange-600 align-baseline font-bold uppercase leading-none text-white"><?= $warga['status'] ?></span>
                                    <?php endif; ?>
                                </td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <a href="<?= base_url('admin/data-warga/detail/' . $warga['id']) ?>" class="mr-1 inline-block px-4 py-2 font-bold text-center bg-blue-500 uppercase align-middle transition-all rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md text-white">Detail</a>
                                    <a href="<?= base_url('admin/data-warga/edit/' . $warga['id']) ?>" class="mr-1 inline-block px-4 py-2 font-bold text-center bg-blue-500 uppercase align-middle transition-all rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md text-white">Edit</a>
                                    <a href="<?= base_url('admin/data-warga/delete/' . $warga['id']) ?>" class="mr-1 inline-block px-4 py-2 font-bold text-center bg-gradient-to-tl from-red-600 to-orange-600 uppercase align-middle transition-all rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md text-white">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-4 mb-6!" style="width: max-content; margin: auto;">
                <?php if ($pager->getPageCount() > 0): ?>
                    <?= $pager->links('warga', 'tailwind_pagination') ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>