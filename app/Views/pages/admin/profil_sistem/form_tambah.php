<?= $this->extend('layouts/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class="px-6 mt-6">
    <?= view('components/alert') ?>
</div>
<div class="px-4 md:px-6! flex flex-col lg:flex-row! items-start justify-center gap-4">
    <div class="w-full relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
        <div class="p-6 mb-0 text-center bg-white border-b-0 rounded-t-2xl">
            <h5>Profil Desa</h5>
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
            <form action="<?= base_url('/admin/profile/update') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="mb-4 flex-1">
                    <label for="" class="mb-2">Gambar Desa</label>
                    <div id="gambar_desa_container" class="hover:cursor-pointer flex justify-center items-center bg-slate-200 w-48 h-28 mb-3 rounded-md">
                        <?php if (isset($gambar_desa['value']) && $gambar_desa['value']) : ?>
                            <img src="/<?= $gambar_desa['value'] ?? "" ?>" alt="" class="w-full h-full object-cover">
                        <?php else : ?>
                            <p class="m-0">Tambah Foto</p>
                        <?php endif ?>
                    </div>
                    <input type="file" hidden name="gambar_desa" id="gambar_desa" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow">
                </div>

                <div class="mb-4">
                    <label for="sejarah" class="mb-2">Sejarah Desa</label><br>
                    <textarea name="sejarah" id="sejarah_txtarea" data-content='<?= htmlspecialchars($sejarah_desa['value'] ?? "", ENT_QUOTES) ?>'></textarea>
                </div>

                <div class="mb-4 flex-1">
                    <label for="" class="mb-2">Visi</label>
                    <input type="text" name="visi" value="<?= $visi['value'] ?? "" ?>" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow">
                </div>

                <div class="mb-4">
                    <label for="misi">Misi</label><br>
                    <textarea name="misi" id="misi_txtarea" data-content='<?= htmlspecialchars($misi['value'] ?? "", ENT_QUOTES) ?>'></textarea>
                </div>

                <br>

                <div class="text-right">
                    <a href="/admin/jenis-surat" class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all bg-slate-700 bg-150 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md mr-2">Batal</a>
                    <button type="submit" class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all bg-blue-500 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <div class="w-full relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border">
        <div class="p-6 mb-0 text-center bg-white border-b-0 rounded-t-2xl">
            <h5>Halaman Beranda</h5>
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
            <form action="<?= base_url('admin/welcome-page/update') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="mb-4 flex-1">
                    <label for="" class="mb-2">Gambar Islustrasi</label>
                    <div id="ilustrasi_desa_container" class="hover:cursor-pointer flex justify-center items-center bg-slate-200 w-48 h-28 mb-3 rounded-md">
                        <?php if (isset($gambar_ilustrasi['value']) && $gambar_ilustrasi['value']) : ?>
                            <img src="/<?= $gambar_ilustrasi['value'] ?? "" ?>" alt="" class="w-full h-full object-cover">
                        <?php else : ?>
                            <p class="m-0">Tambah Foto</p>
                        <?php endif ?>
                    </div>
                    <input type="file" hidden name="ilustrasi_desa" id="ilustrasi_desa" class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow">
                </div>

                <div class="mb-4">
                    <label for="judul_sambutan" class="mb-2">Judul Sambutan</label><br>
                    <input type="text" name="judul_sambutan" id="judul_sambutan" value="<?= $judul_sambutan['value'] ?? '' ?>" required class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Selamat Datang">
                </div>

                <div class="mb-4">
                    <label for="subjudul_sambutan" class="mb-2">Subjudul Sambutan</label><br>
                    <input type="text" name="subjudul_sambutan" id="subjudul_sambutan" value="<?= $subjudul_sambutan['value'] ?? '' ?>" required class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow" placeholder="Di sistem desa...">
                </div>

                <br>

                <div class="text-right">
                    <a href="/admin/jenis-surat" class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all bg-slate-700 bg-150 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md mr-2">Batal</a>
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
        selector: '#sejarah_txtarea',
        plugins: 'lists link table code',
        toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | bullist numlist | variables | code',
        setup: function(editor) {
            editor.on('init', function() {
                const textarea = document.getElementById('sejarah_txtarea');
                const initialContent = textarea.dataset.content || '';
                editor.setContent(initialContent);
            });
            editor.on('change', function() {
                editor.save();
            });
        }
    });

    tinymce.init({
        selector: '#misi_txtarea',
        plugins: 'lists link table code',
        toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | bullist numlist | variables | code',
        setup: function(editor) {
            editor.on('init', function() {
                const textarea = document.getElementById('misi_txtarea');
                const initialContent = textarea.dataset.content || '';
                editor.setContent(initialContent);
            });
            editor.on('change', function() {
                editor.save();
            });
        }
    });

    const sejarahTxtArea = document.getElementById('sejarah_txtarea');
    const misiTxtArea = document.getElementById('misi_txtarea');
    const gambarDesaContainer = document.getElementById('gambar_desa_container');
    const gbrdesa_input = document.getElementById('gambar_desa');
    const ilustrasiDesaContainer = document.getElementById('ilustrasi_desa_container');
    const ilustrasi_input = document.getElementById('ilustrasi_desa');


    gambarDesaContainer.addEventListener('click', (e) => {
        gbrdesa_input.click();
    })

    gbrdesa_input.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                gambarDesaContainer.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover">`;
            };

            reader.readAsDataURL(this.files[0]);
        }
    });

    ilustrasiDesaContainer.addEventListener('click', (e) => {
        ilustrasi_input.click();
    })

    ilustrasi_input.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                ilustrasiDesaContainer.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover">`;
            };

            reader.readAsDataURL(this.files[0]);
        }
    });

    // Handle form submit
    sejarahTxtArea.addEventListener('submit', function(e) {
        // sebelum submit, simpan konten editor ke textarea
        tinyMCE.triggerSave();

        // ambil isi editor
        let isi = tinyMCE.activeEditor.getContent().trim();
        isi = isi
            .replace(/^(<p><br><\/p>|<br\s*\/?>)+/gi, '')
            .replace(/(<p><br><\/p>|<br\s*\/?>)+$/gi, '');

        // set isi ke textarea sebelum submit
        document.getElementById('sejarah_txtarea').value = isi;
    });

    // Handle form submit
    misiTxtArea.addEventListener('submit', function(e) {
        // sebelum submit, simpan konten editor ke textarea
        tinyMCE.triggerSave();

        // ambil isi editor
        let isi = tinyMCE.activeEditor.getContent().trim();
        isi = isi
            .replace(/^(<p><br><\/p>|<br\s*\/?>)+/gi, '')
            .replace(/(<p><br><\/p>|<br\s*\/?>)+$/gi, '');

        // set isi ke textarea sebelum submit
        document.getElementById('misi_txtarea').value = isi;
    });
</script>


<?= $this->endSection(); ?>