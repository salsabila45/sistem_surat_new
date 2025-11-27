<?= $this->extend('layouts/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class="w-full px-4 md:px-6! py-6 mx-auto" style="margin-top: 0rem;">
    <div class="flex flex-col lg:flex-row! gap-4">
        <div class="flex-1 relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border w-full">
            <div class="p-6 mb-0 text-center bg-white border-b-0 rounded-t-2xl">
                <h5><?= !empty($jenisSurat['template']) ? "Edit" : "Tambah" ?> Template Surat</h5>
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

            <div class="px-4 md:px-8! py-6">
                <form
                    action="<?= base_url('admin/jenis-surat/update/' . $jenisSurat['id']) ?>"
                    method="post"
                    id="form_tambah_template">
                    <?= csrf_field() ?>

                    <input type="hidden" name="kode" value="<?= $jenisSurat['kode'] ?>">
                    <input type="hidden" name="status" value="<?= $jenisSurat['status'] ?>">
                    <input type="hidden" name="deskripsi" value="<?= $jenisSurat['deskripsi'] ?>">

                    <div class="mb-4">
                        <label for="nama">Judul Surat</label><br>
                        <input
                            type="text"
                            name="nama"
                            id="nama"
                            value="<?= old('nama', $jenisSurat['nama'] ?? '') ?>"
                            required
                            class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                            placeholder="Surat sehat">
                    </div>

                    <div class="mb-4">
                        <label for="template">Isi Surat</label><br>
                        <textarea name="template" id="form_template" data-content='<?= htmlspecialchars($jenisSurat["template"] ?? "", ENT_QUOTES) ?>'></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="persyaratan">Persyaratan</label><br>
                        <input
                            type="text"
                            name="persyaratan"
                            id="persyaratan"
                            value="<?= old('persyaratan', $jenisSurat['persyaratan'] ?? '') ?>"
                            class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                            placeholder="KTP, KK">
                    </div>

                    <br>

                    <div class="text-right">
                        <a href="/admin/jenis-surat"
                            class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all bg-slate-700 bg-150 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md mr-2">
                            Batal
                        </a>

                        <button
                            type="submit"
                            class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all bg-blue-500 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md mr-2">
                            <?= !empty($jenisSurat['template']) ? 'Update' : 'Simpan' ?>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="flex-1 relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border w-full">
            <div class="px-4 md:px-8! py-6 bg-white rounded-xl" id="preview_surat">
                <div class="flex items-center justify-center">
                    <img src="/uploads/desa/<?= $kopSurat['logo'] ?>" alt="" class="w-16 h-16 justify-start">
                    <div id="kop_surat_slot" class="text-center border-b flex-1">
                        <h2 class="text-lg font-bold uppercase"><?= $kopSurat['nama_instansi'] ?></h2>
                        <h3 class="text-base font-semibold uppercase">Kecamatan <?= $kopSurat['kecamatan'] ?> DESA <?= $kopSurat['desa'] ?></h3>
                        <p class="text-sm"><?= $kopSurat['alamat'] ?>, Kode Pos <?= $kopSurat['kode_pos'] ?></p>
                    </div>
                    <img src="/uploads/desa/<?= $kopSurat['logo'] ?>" alt="" class="w-16 h-16 justify-start opacity-0">
                </div>

                <div class="text-center mb-8">
                    <h4 id="judul_slot" class="font-bold underline text-lg"><?= $jenisSurat['nama'] ?? '' ?></h4>
                    <p class="text-sm mt-1">Nomor: ....../....../....../2025</p>
                </div>

                <div id="template_slot" class="text-justify leading-relaxed text-gray-800 mb-10"></div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script>
    function generateVariableItems(editor, variables) {
        return variables.map(v => ({
            type: 'menuitem',
            text: `\${${v}}`,
            onAction: function() {
                editor.insertContent(`\${${v}}`);
            }
        }));
    }

    const isiSurat = <?= json_decode($jenisSurat["template"]) ?>
    tinymce.init({
        selector: '#form_template',
        plugins: 'lists link table code',
        toolbar: 'undo redo | bold italic underline | alignleft aligncenter alignright | bullist numlist | variables | code',
        setup: function(editor) {
            const variableNames = [
                'no_kk', 'alamat', 'rt_rw', 'desa', 'kecamatan', 'kabupaten',
                'kode_pos', 'nik', 'nama', 'jenis_kelamin', 'tempat_lahir',
                'agama', 'pendidikan', 'pekerjaan', 'gol_darah', 'status', 'kewarganegaraan'
            ];

            const items = generateVariableItems(editor, variableNames);

            editor.ui.registry.addMenuButton('variables', {
                text: 'Variables',
                fetch: function(callback) {
                    callback(items);
                }
            });

            editor.on('keyup change', function() {
                reload_review();
            });

            editor.on('init', function() {
                const textarea = document.getElementById('form_template');
                const initialContent = textarea.dataset.content || '';
                editor.setContent(initialContent);
                reload_review();
            });

            editor.on('change', function() {
                editor.save();
            });
        }
    });

    const formTemplate = document.getElementById('form_tambah_template');
    const previewBtn = document.getElementById('btn_preview');
    const judulSlot = document.getElementById('judul_slot');
    const isiSuratSlot = document.getElementById('template_slot');
    const syaratSlot = document.getElementById('syarat_slot');
    const judulSurat = document.getElementById('nama');
    const persyaratanSurat = document.getElementById('persyaratan');

    function reload_review() {
        const judul = judulSurat.value.trim();
        let isi = tinyMCE.activeEditor.getContent().trim();
        isi = isi
            .replace(/^(<p><br><\/p>|<br\s*\/?>)+/gi, '')
            .replace(/(<p><br><\/p>|<br\s*\/?>)+$/gi, '');
        const syarat = persyaratanSurat.value.trim();

        judulSlot.innerText = judul || 'Judul Surat';
        isiSuratSlot.innerHTML = isi ? `<div style="text-indent:2rem">${isi}</div>` : '<p><i>Belum ada isi surat</i></p>';
    };

    judulSurat.addEventListener('keyup', () => {
        reload_review();
    })

    persyaratanSurat.addEventListener('keyup', () => {
        reload_review();
    })

    // Handle form submit
    formTemplate.addEventListener('submit', function(e) {
        // sebelum submit, simpan konten editor ke textarea
        tinyMCE.triggerSave();

        // ambil isi editor
        let isi = tinyMCE.activeEditor.getContent().trim();
        isi = isi
            .replace(/^(<p><br><\/p>|<br\s*\/?>)+/gi, '')
            .replace(/(<p><br><\/p>|<br\s*\/?>)+$/gi, '');

        // set isi ke textarea sebelum submit
        document.getElementById('form_template').value = isi;
    });
</script>


<?= $this->endSection(); ?>