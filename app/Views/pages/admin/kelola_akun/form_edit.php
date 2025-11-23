<?= $this->extend('layouts/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class="flex items-center justify-center mx-3" style="margin-top: 5rem;">
    <div class="relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border" style="width: 35rem;">
        <div class="p-6 mb-0 text-center bg-white border-b-0 rounded-t-2xl">
            <h5>Update Data Admin</h5>
        </div>

        <?php if (session()->getFlashdata('errors')): ?>
            <div style="color: red;">
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif ?>

        <div class="flex-auto p-6">
            <form action="<?= base_url('admin/kelola-akun/update/' . $admin['id']) ?>" method="post">
                <?= csrf_field() ?>

                <div class="mb-4">
                    <label class="mb-1" for="name">Nama</label><br>
                    <input type="text" name="name" id="name" value="<?= old('kode', $admin['name']) ?>" required class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="SKD-01">
                </div>

                <div class="mb-4">
                    <label class="mb-1" for="username">Username</label><br>
                    <input type="text" name="username" id="username" value="<?= old('nama', $admin['username']) ?>" required class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Surat Keterangan">
                </div>

                <div class="mb-4">
                    <label class="mb-1" for="password">Password</label><br>
                    <input type="password" name="password" id="password" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Update Password">
                </div>

                <br>

                <div class="text-right">
                    <a href="/admin/kelola-akun" class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all bg-slate-700 bg-150 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md mr-2">Batal</a>
                    <button type="submit" class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all bg-blue-500 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>