<?= $this->extend('layouts/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class="flex flex-col md:flex-row! items-start justify-center gap-4 md:gap-6 px-4 md:px-6!" style="margin-top: 5rem;">
    <div class="flex-1 w-full relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
        <div class="p-6 mb-0 text-center bg-white border-b-0 rounded-t-2xl">
            <h5>Hak Akses Admin</h5>
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

        <div class="p-6">
            <div class="flex-auto px-0 pt-0 pb-2">
                <div class="p-0 overflow-x-auto">
                    <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                        <thead class="align-bottom">
                            <tr>
                                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Menu</th>
                                <th class="px-6 py-3 pl-2 font-bold text-right uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Akses</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($admin_menus as $index => $menu): ?>
                                <tr>
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <div class="flex px-2 py-1">
                                            <h6 class="mb-0 leading-normal text-sm"><?= $menu['nama_menu'] ?></h6>
                                        </div>
                                    </td>
                                    <td class="p-2 align-end bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <div class="min-h-6 mb-0.5 flex items-center justify-end">
                                            <input id="<?= 'admin_menu' . $index ?>" onchange="toggleMenu('<?= $menu['id'] ?>')" <?= $menu['is_active'] ? 'checked' : '' ?> class="rounded-10 duration-300 ease-in-out after:rounded-circle after:shadow-2xl after:duration-300 checked:after:translate-x-5.3 h-5 mt-0.5 relative float-left w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-blue-500/95 checked:bg-blue-500/95 checked:bg-none checked:bg-right" type="checkbox" />
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="flex-1 w-full relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
        <div class="p-6 mb-0 text-center bg-white border-b-0 rounded-t-2xl">
            <h5>Hak Akses Masyarakat</h5>
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

        <div class="p-6">
            <div class="flex-auto px-0 pt-0 pb-2">
                <div class="p-0 overflow-x-auto">
                    <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                        <thead class="align-bottom">
                            <tr>
                                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Menu</th>
                                <th class="px-6 py-3 pl-2 font-bold text-right uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Akses</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($warga_menus as $index => $menu): ?>
                                <tr>
                                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <div class="flex px-2 py-1">
                                            <h6 class="mb-0 leading-normal text-sm"><?= $menu['nama_menu'] ?></h6>
                                        </div>
                                    </td>
                                    <td class="p-2 align-end bg-transparent border-b whitespace-nowrap shadow-transparent">
                                        <div class="min-h-6 mb-0.5 flex items-center justify-end">
                                            <input id="<?= 'warga_menu' . $index ?>" onchange="toggleMenu('<?= $menu['id'] ?>')" <?= $menu['is_active'] ? 'checked' : '' ?> class="rounded-10 duration-300 ease-in-out after:rounded-circle after:shadow-2xl after:duration-300 checked:after:translate-x-5.3 h-5 mt-0.5 relative float-left w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-blue-500/95 checked:bg-blue-500/95 checked:bg-none checked:bg-right" type="checkbox" />
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    function toggleMenu(id) {
        // Redirect to hak-akses/toggle/(:id)
        window.location.href = `<?= base_url('admin/hak-akses/toggle/') ?>${id}`;
    }
</script>
<?= $this->endSection(); ?>