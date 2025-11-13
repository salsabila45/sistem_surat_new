<?= $this->extend('layouts/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class="px-4 md:px-6 flex items-center justify-center" style="margin-top: 5rem;">
    <div class="relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border" style="width: 35rem;">
        <div class="p-6 mb-0 text-center bg-white border-b-0 rounded-t-2xl">
            <h5>Form Pengajuan Surat</h5>
        </div>
        <div class="flex-auto p-6">
            <form role="form text-left" method="POST" action="<?= base_url() . 'masyarakat/pengajuan-surat/simpan' ?>" enctype="multipart/form-data">
                <input type="hidden" name="warga_id" value="<?= $user['id'] ?>">
                <div class="mb-4 flex-1">
                    <label for="" class="mb-2">Nama</label>
                    <input type="text" name="nama" value="<?= $dataWarga['nama_lengkap'] ?? '' ?>" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Herman wijayanto" aria-label="Name" aria-describedby="email-addon">
                </div>
                <div class="mb-4 flex-1">
                    <label for="" class="mb-2">NIK</label>
                    <input type="number" name="nik" value="<?= $dataWarga['nik'] ?? '' ?>" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="3302200403020001" aria-label="Name" aria-describedby="email-addon">
                </div>
                <div class="mb-4 flex-1">
                    <label for="" class="mb-2">Alamat</label>
                    <input type="text" name="alamat" value="<?= $dataWarga['alamat'] ?? '' ?>" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Jl Dukuhmekar 12. Sumbang" aria-label="Name" aria-describedby="email-addon">
                </div>
                <div class="mb-4 flex-1">
                    <label for="" class="mb-2">Jensi Surat</label>
                    <select name="jenis_surat_id" id="" class="text-sm focus:shadow-primary-outline leading-5.6 ease block w-full rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow">
                        <?php foreach ($jenisSurat as $jenisSurat): ?>
                            <option value="<?= $jenisSurat['id'] ?>"><?= $jenisSurat['nama'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-4 flex-1">
                    <label for="" class="mb-2">Keperluan</label>
                    <textarea name="keperluan" rows="3" placeholder="Tulis keperluan anda..." class="focus:shadow-primary-outline min-h-unset text-sm leading-5.6 ease block h-auto w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none"></textarea>
                </div>

                <div class="mb-4 flex-1">
                    <label for="" class="mb-2">Lampiran Persyaratan</label>
                    <input type="file" name="lampiran[]" multiple class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow">
                </div>

                <br>

                <div class="text-right">
                    <a href="/admin/data-warga" class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all bg-slate-700 bg-150 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md mr-2">Batal</a>
                    <button type="submit" class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all bg-blue-500 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md">Ajukan Surat</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>