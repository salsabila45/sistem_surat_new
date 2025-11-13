<?= $this->extend('layouts/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class="flex items-center justify-center" style="margin-top: 5rem;">
    <div class="mx-4 relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border" style="width: 35rem;">
        <div class="p-6 mb-0 text-center bg-white border-b-0 rounded-t-2xl">
            <h5>Edit Data Warga</h5>
            <?php if (isset($_SESSION['error'])): ?>
                <p class="text-red-600 text-sm"><?= $_SESSION['error'] ?></p>
            <?php endif; ?>
        </div>
        <div class="flex-auto p-6">
            <form role="form text-left" method="POST" action="<?= base_url('admin/data-warga/update/' . $warga['id']); ?>">
                <?= csrf_field() ?>
                <div class="flex" style="gap: 12px;">
                    <div class="mb-4 flex-1">
                        <label class="mb-2">NIK</label>
                        <input type="number"
                            name="nik"
                            value="<?= esc($warga['nik']) ?>"
                            class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:outline-none focus:transition-shadow"
                            placeholder="3302200403020001">
                    </div>
                    <div class="mb-4 flex-1">
                        <label class="mb-2">Nama</label>
                        <input type="text"
                            name="nama"
                            value="<?= esc($warga['nama_lengkap']) ?>"
                            class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:outline-none focus:transition-shadow"
                            placeholder="Nama Orang">
                    </div>
                </div>

                <div class="flex" style="gap: 12px;">
                    <div class="mb-4 flex-1">
                        <label class="mb-2">Tempat Lahir</label>
                        <input type="text"
                            name="tempat_lahir"
                            value="<?= esc($warga['tempat_lahir']) ?>"
                            class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:outline-none focus:transition-shadow"
                            placeholder="Purbalingga">
                    </div>
                    <div class="mb-4 flex-1">
                        <label class="mb-2">Tanggal Lahir</label>
                        <input type="date"
                            name="tanggal_lahir"
                            value="<?= esc($warga['tanggal_lahir']) ?>"
                            class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:outline-none focus:transition-shadow"
                            placeholder="">
                    </div>
                </div>

                <div class="flex" style="gap: 12px;">
                    <div class="mb-4 flex-1">
                        <label class="mb-2">Alamat</label>
                        <input type="text"
                            name="alamat"
                            value="<?= esc($warga['alamat']) ?>"
                            class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:outline-none focus:transition-shadow"
                            placeholder="Jl Dukuhmekar 12. Sumbang">
                    </div>
                    <div class="mb-4 flex-1">
                        <label class="mb-2">No Hp</label>
                        <input type="number"
                            name="no_hp"
                            value="<?= esc($warga['no_hp']) ?>"
                            class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:outline-none focus:transition-shadow"
                            placeholder="08820037812">
                    </div>
                </div>

                <div class="flex" style="gap: 12px;">
                    <div class="mb-4 flex-1">
                        <label class="mb-2">Email</label>
                        <input type="email"
                            name="email"
                            value="<?= esc($warga['email']) ?>"
                            class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:outline-none focus:transition-shadow"
                            placeholder="user@gmail.com">
                    </div>
                    <div class="mb-4 flex-1">
                        <label class="mb-2">Jenis Kelamin</label>
                        <select name="jenis_kelamin"
                            class="text-sm focus:shadow-primary-outline leading-5.6 ease block w-full rounded-lg border border-solid border-gray-300 bg-white py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:outline-none focus:transition-shadow">
                            <option value="L" <?= $warga['jenis_kelamin'] == 'L' ? 'selected' : '' ?>>Laki-Laki</option>
                            <option value="P" <?= $warga['jenis_kelamin'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="flex" style="gap: 12px;">
                    <div class="mb-4 flex-1">
                        <label class="mb-2">Agama</label>
                        <input type="text"
                            name="agama"
                            value="<?= esc($warga['agama']) ?>"
                            class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:outline-none focus:transition-shadow"
                            placeholder="Islam">
                    </div>
                    <div class="mb-4 flex-1">
                        <label class="mb-2">Status</label>
                        <select name="status"
                            class="text-sm focus:shadow-primary-outline leading-5.6 ease block w-full rounded-lg border border-solid border-gray-300 bg-white py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:outline-none focus:transition-shadow">
                            <option value="aktif" <?= $warga['status'] == 'aktif' ? 'selected' : '' ?>>Aktif</option>
                            <option value="nonaktif" <?= $warga['status'] == 'nonaktif' ? 'selected' : '' ?>>Nonaktif</option>
                        </select>
                    </div>
                </div>

                <br>

                <div class="text-right">
                    <a href="/admin/data-warga" class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all bg-slate-700 bg-150 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md mr-2">Batal</a>
                    <button type="submit" class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all bg-blue-500 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>