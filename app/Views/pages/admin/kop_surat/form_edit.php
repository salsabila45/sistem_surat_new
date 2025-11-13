<?= $this->extend('layouts/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class="flex items-center justify-center mx-4 md:mx-0!" style="margin-top: 5rem;">
    <div class="relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border" style="width: 35rem;">
        <div class="p-6 mb-0 text-center bg-white border-b-0 rounded-t-2xl">
            <h5>Update Kop Surat</h5>
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
            <form action="<?= base_url('admin/kop-surat/update/' . $kopSurat['id']) ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="mb-4 flex-1">
                    <label for="" class="mb-2">Logo Kop</label>
                    <div id="kop_logo_container" class="hover:cursor-pointer flex justify-center items-center bg-slate-200 w-48 h-28 mb-3 rounded-md">
                        <?php if ($kopSurat['logo']) : ?>
                            <img src="/uploads/desa/<?= $kopSurat['logo'] ?? "" ?>" alt="" class="w-full h-full object-cover">
                        <?php else : ?>
                            <p class="m-0">Tambah Foto</p>
                        <?php endif ?>
                    </div>
                    <input type="file" hidden name="logo" id="logo_kop_surat" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow">
                </div>

                <div class="mb-4">
                    <label for="nama_instansi">Nama Instansi</label><br>
                    <input type="text" name="nama_instansi" id="nama_instansi" value="<?= old('nama_instansi', $kopSurat['nama_instansi']) ?>" required class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="SKD-01">
                </div>

                <div class="mb-4">
                    <label for="alamat">Alamat</label><br>
                    <input type="text" name="alamat" id="alamat" value="<?= old('alamat', $kopSurat['alamat']) ?>" required class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="SKD-01">
                </div>
                
                 <div class="mb-4">
                    <label for="desa">Desa</label><br>
                    <input type="text" name="desa" id="desa" value="<?= old('desa', $kopSurat['desa']) ?>" required class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Gambarsari">
                </div>

                <div class="mb-4">
                    <label for="kecamatan">Kecamatan</label><br>
                    <input type="text" name="kecamatan" id="kecamatan" value="<?= old('kecamatan', $kopSurat['kecamatan']) ?>" required class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="SKD-01">
                </div>

                <div class="mb-4">
                    <label for="kabupaten">Kabupaten</label><br>
                    <input type="text" name="kabupaten" id="kabupaten" value="<?= old('kabupaten', $kopSurat['kabupaten']) ?>" required class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="SKD-01">
                </div>

                <div class="mb-4">
                    <label for="provinsi">Provinsi</label><br>
                    <input type="text" name="provinsi" id="provinsi" value="<?= old('provinsi', $kopSurat['provinsi']) ?>" required class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="SKD-01">
                </div>

                <div class="mb-4">
                    <label for="kode_pos">Kode Pos</label><br>
                    <input type="text" name="kode_pos" id="kode_pos" value="<?= old('kode_pos', $kopSurat['kode_pos']) ?>" required class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="SKD-01">
                </div>

                <br>

                <div class="text-right">
                    <a href="/admin/jenis-surat" class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all bg-slate-700 bg-150 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md mr-2">Batal</a>
                    <button type="submit" class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all bg-blue-500 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    const KopSuratContainer = document.getElementById('kop_logo_container');
    const kopSurat = document.getElementById('logo_kop_surat');


    KopSuratContainer.addEventListener('click', (e) => {
        kopSurat.click();
    })

    kopSurat.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                KopSuratContainer.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover">`;
            };

            reader.readAsDataURL(this.files[0]);
        }
    });
</script>
<?= $this->endSection() ?>