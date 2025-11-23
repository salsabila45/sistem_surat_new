<?= $this->extend('layouts/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class=" w-full px-4 md:px-6! py-6 mx-auto">
    <div class="relative flex flex-col w-full min-w-0 mb-0 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
        <div class="p-6 pb-0 mb-0 bg-white rounded-t-2xl">
            <div class="flex items-center justify-between mb-2">
                <h6 class="mb-4">Kelola Akun</h6>
                <a href="/admin/kelola-akun/tambah" class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-gradient-to-tl from-blue-500 to-violet-500 leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md">Tambah Akun</a>
            </div>
        </div>
        <div class="flex-auto px-0 pt-0 pb-2">
            <div class="px-6 py-1">
                <?= view('components/alert') ?>
            </div>
            <div class="p-0 overflow-x-auto">
                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                    <thead class="align-bottom">
                        <tr>
                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">No</th>
                            <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Username</th>
                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Nama</th>
                            <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($admins as $index => $admin): ?>
                            <tr>
                                <td class="px-3 py-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <div class="flex px-2 py-1">
                                        <h6 class="mb-0 leading-normal text-sm"><?= $index + 1 ?></h6>
                                    </div>
                                </td>
                                <td class="px-3 py-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-xs"><?= $admin['username'] ?></p>
                                </td>
                                <td class="px-3 py-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-xs"><?= $admin['name'] ?></p>
                                </td>
                                <td class="px-3 py-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <a href="<?= base_url('admin/kelola-akun/edit/' . $admin['id']) ?>" class="mr-1 inline-block px-4 py-2 font-bold text-center bg-gradient-to-tl from-blue-500 to-violet-500 uppercase align-middle transition-all rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md text-white">Edit</a>
                                    <a href="<?= base_url('admin/kelola-akun/hapus/' . $admin['id']) ?>" class="mr-1 inline-block px-4 py-2 font-bold text-center bg-gradient-to-tl from-red-600 to-orange-600 uppercase align-middle transition-all rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md text-white">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>