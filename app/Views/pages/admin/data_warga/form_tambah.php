<?= $this->extend('layouts/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class="flex items-center justify-center" style="margin-top: 5rem;">
    <div class="relative mx-4 z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border" style="width: 35rem;">
        <div class="p-6 mb-0 text-center bg-white border-b-0 rounded-t-2xl">
            <h5>Tambah Data Warga</h5>
            <?php if (isset($_SESSION['error'])): ?>
                <p class="text-red-600 text-sm"><?= $_SESSION['error'] ?></p>
            <?php endif; ?>
        </div>
        <div class="flex-auto p-6">
            <form role="form text-left" method="POST" action="<?= base_url() . 'admin/data-warga/tambah' ?>">
                <div class="flex" style="gap: 12px;">
                    <div class="mb-4 flex-1">
                        <label for="" class="mb-2">NIK</label>
                        <input type="number" name="nik" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="3302200403020001" aria-label="Name" aria-describedby="email-addon">
                    </div>
                    <div class="mb-4 flex-1">
                        <label for="" class="mb-2">Nama</label>
                        <input type="text" name="nama" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Nama Orang" aria-label="Email" aria-describedby="email-addon">
                    </div>
                </div>
                 <div class="flex" style="gap: 12px;">
                    <div class="mb-4 flex-1">
                        <label for="" class="mb-2">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Purbalingga" aria-label="Name" aria-describedby="email-addon">
                    </div>
                    <div class="mb-4 flex-1">
                        <label for="" class="mb-2">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" aria-label="Email" aria-describedby="email-addon">
                    </div>
                </div>
                <div class="flex" style="gap: 12px;">
                    <div class="mb-4 flex-1">
                        <label for="" class="mb-2">Alamat</label>
                        <input type="text" name="alamat" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Jl Dukuhmekar 12. Sumbang" aria-label="Name" aria-describedby="email-addon">
                    </div>
                    <div class="mb-4 flex-1">
                        <label for="" class="mb-2">No Hp</label>
                        <input type="number" name="no_hp" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="08820037812" aria-label="Email" aria-describedby="email-addon">
                    </div>
                </div>
                <div class="flex" style="gap: 12px;">
                    <div class="mb-4 flex-1">
                        <label for="" class="mb-2">Email</label>
                        <input type="email" name="email" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="user@gmail.com" aria-label="Name" aria-describedby="email-addon">
                    </div>
                    <div class="mb-4 flex-1">
                        <label for="" class="mb-2">Jensi Kelamin</label>
                        <select name="jenis_kelamin" id="" class="text-sm focus:shadow-primary-outline leading-5.6 ease block w-full rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow">
                            <option value="L">Laki Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div class="flex" style="gap: 12px;">
                    <div class="mb-4 flex-1">
                        <label for="" class="mb-2">Agama</label>
                        <input type="text" name="agama" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Islam" aria-label="Name" aria-describedby="email-addon">
                    </div>
                    <div class="mb-4 flex-1">
                        <label for="" class="mb-2">Status</label>
                        <select name="status" id="" placeholder="Email" class="text-sm focus:shadow-primary-outline leading-5.6 ease block w-full rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow">
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Nonaktif</option>
                        </select>
                    </div>
                </div>

                <br>

                <div class="text-right">
                    <a href="/admin/data-warga" class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all bg-slate-700 bg-150 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md mr-2">Batal</a>
                    <button type="submit" class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all bg-blue-500 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>