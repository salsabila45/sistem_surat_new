<?= $this->extend('layouts/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class="flex items-center justify-center" style="margin-top: 5rem;">
    <div class="relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
        <div class="p-6 mb-0 text-center bg-white border-b-0 rounded-t-2xl">
            <h5>Tambah Berita</h5>
        </div>
        <div class="flex-auto p-6">
            <form action="<?= base_url('/admin/berita/simpan') ?>" method="POST" enctype="multipart/form-data">
                <div class="mb-4">
                    <label for="judul">Judul Berita</label><br>
                    <input type="text" name="judul" id="judul" value="<?= old('judul') ?>" required class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Perbaikan jalan desa">
                </div>


                <div class="mb-4">
                    <label for="isi">Isi Berita</label><br>
                    <textarea name="isi" id="isi_txtarea" data-content='<?= htmlspecialchars($jenisSurat["template"] ?? "", ENT_QUOTES) ?>'></textarea>
                </div>

                <div class="mb-4">
                    <label for="deskripsi">Kategori</label><br>
                    <select name="kategori_id" class="w-full border border-gray-300 p-2 rounded">
                        <option value="">-- Pilih Kategori --</option>
                        <?php foreach ($kategori as $k): ?>
                            <option value="<?= $k['id'] ?>" <?= old('kategori_id') == $k['id'] ? 'selected' : '' ?>>
                                <?= esc($k['nama']) ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block mb-1">Gambar</label>
                    <input type="file" name="gambar" class="w-full border border-gray-300 p-2 rounded">
                </div>

                <br>

                <div class="text-right">
                    <a href="/penulis/tulis-berita" class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all bg-slate-700 bg-150 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md mr-2">Batal</a>
                    <button type="submit" class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all bg-blue-500 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>


<?= $this->section('script') ?>
<script>
    tinymce.init({
        selector: '#isi_txtarea',
        plugins: 'lists link table code',
        toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | bullist numlist | variables | code',
        setup: function(editor) {
            editor.on('change', function() {
                editor.save();
            });
        }
    });

    const isiTxtArea = document.getElementById('isi_txtarea');

    // Handle form submit
    isiTxtArea.addEventListener('submit', function(e) {
        // sebelum submit, simpan konten editor ke textarea
        tinyMCE.triggerSave();

        // ambil isi editor
        let isi = tinyMCE.activeEditor.getContent().trim();
        isi = isi
            .replace(/^(<p><br><\/p>|<br\s*\/?>)+/gi, '')
            .replace(/(<p><br><\/p>|<br\s*\/?>)+$/gi, '');

        // set isi ke textarea sebelum submit
        document.getElementById('isi_txtarea').value = isi;
    });
</script>


<?= $this->endSection(); ?>