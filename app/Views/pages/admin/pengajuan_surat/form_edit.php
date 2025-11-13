<?= $this->extend('layouts/dashboard_layout') ?>

<?= $this->section('content') ?>
<div class="w-full px-4 md:px-6 py-6 mx-auto" style="margin-top: 0rem;">
    <div class="flex flex-col xl:flex-row! gap-4">
        <div class="flex-1 relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border w-full">
            <div class="p-6 mb-0 text-center bg-white border-b-0 rounded-t-2xl">
                <h5>Edit Data Pengajuan Surat</h5>
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

            <div class="px-4 md:px-8 py-6">
                <form
                    action="<?= base_url('admin/pengajuan-surat/' . $dataPengajuan['id'] . '/update') ?>"
                    method="post"
                    id="form_edit_pengajuan">
                    <?= csrf_field() ?>

                    <input type="hidden" name="content_surat" id="content_surat">

                    <div class="mb-4">
                        <label for="judul">Judul Surat</label><br>
                        <input
                            type="text"
                            name="judul"
                            id="judul"
                            value="<?= old('judul', $dataPengajuan['jenis_surat'] ?? '') ?>"
                            required
                            class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                            placeholder="Surat sehat">
                    </div>

                    <div class="mb-4">
                        <label for="no_surat">No Surat</label><br>
                        <input
                            type="text"
                            name="no_surat"
                            id="no_surat"
                            value="<?= old('no_surat', $dataPengajuan['no_surat'] ?? '') ?>"
                            required
                            class="placeholder:text-gray-500 text-sm focus:shadow-primary-outline leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 px-3 font-normal text-gray-700 transition-all focus:border-blue-500 focus:bg-white focus:text-gray-700 focus:outline-none focus:transition-shadow"
                            placeholder="Surat sehat">
                    </div>

                    <div class="mb-4">
                        <label for="template">Isi Surat</label><br>
                        <textarea name="template" id="txtarea_template" data-content='<?= htmlspecialchars($jenisSurat["template"] ?? "", ENT_QUOTES) ?>'></textarea>
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
                            Simpan dan Setujui
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="flex-1 relative z-0 flex flex-col min-w-0 break-words bg-white border-0 shadow-xl rounded-2xl bg-clip-border w-full">
            <div class="px-4 md:px-8! py-6 bg-white rounded-xl" id="preview_surat">
                <div id="preview_slot"></div>
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

    tinymce.init({
        selector: '#txtarea_template',
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
                const textarea = document.getElementById('txtarea_template');
                const initialContent = textarea.dataset.content || '';
                editor.setContent(initialContent);
                reload_review();
            });
        }
    });

    const formPengajuan = document.getElementById('form_edit_pengajuan');
    const previewBtn = document.getElementById('btn_preview');
    const judulSuratInput = document.getElementById('judul');
    const noSuratInput = document.getElementById('no_surat');
    const slotPreview = document.getElementById('preview_slot');
    const contentSuratInput = document.getElementById('content_surat');

    const dataPengajuan = <?= json_encode($dataPengajuan) ?>;
    const dataWarga = <?= json_encode($dataWarga) ?>;
    const dataKopSurat = <?= json_encode($kopSurat) ?>;

    const kopSurat = `
                <div class="kop-surat flex items-center justify-center">
                    <img src="/uploads/desa/${dataKopSurat.logo}" alt="" class="logo-kop w-16 h-16 justify-start">
                    <div class="institusi text-center border-b flex-1">
                        <h2 class="text-lg font-bold uppercase">${dataKopSurat.nama_instansi}</h2>
                        <h3 class="text-base font-semibold uppercase">Kecamatan ${dataKopSurat.kecamatan} DESA ${dataKopSurat.desa}</h3>
                        <p class="text-sm">${dataKopSurat.alamat}, Kode Pos ${dataKopSurat.kode_pos}</p>
                    </div>
                    <img src="/uploads/desa/${dataKopSurat.logo}" alt="" class="logo-hidden w-16 h-16 justify-start opacity-0">
                </div>`

    function gen_konten_surat({
        noSurat,
        judul,
        isi,
    }) {
        return `
            <div class="text-center">
                <h4 id="judul_surat" class="text-center font-bold underline text-base">${judul || 'Judul Surat'}</h4>
                <p id="no_surat" class="text-sm mt-1">Nomor: ${noSurat}</p>
            </div>
            <br/>

            <div id="template_slot" class="text-justify leading-relaxed text-gray-800 mb-10">${isi || '<i>Belum ada isi surat</i>'}</div>
        `;
    }

    const warga = {
        nama: dataPengajuan.nama || dataWarga.nama,
        nik: dataPengajuan.nik || dataWarga.nik,
        alamat: dataPengajuan.alamat || dataWarga.alamat,
        ...dataWarga
    };

    function renderTemplate(isi, data) {
        return isi.replace(/\$\{(\w+)\}/g, (match, key) => {
            return data[key] !== undefined ? data[key] : match;
        });
    }

    function reload_review() {
        const judul = judulSuratInput.value.trim();
        let isi = tinyMCE.activeEditor.getContent().trim();
        isi = isi
            .replace(/^(<p><br><\/p>|<br\s*\/?>)+/gi, '')
            .replace(/(<p><br><\/p>|<br\s*\/?>)+$/gi, '');

        isi = renderTemplate(isi, warga);

        const noSurat = noSuratInput.value.trim();

        slotPreview.innerHTML = `
            ${kopSurat}
            ${gen_konten_surat({ noSurat, judul, isi})}
        `

        contentSuratInput.value = gen_konten_surat({
            noSurat,
            judul,
            isi,
        });
    };

    judulSuratInput.addEventListener('keyup', () => {
        reload_review()
    })
    noSuratInput.addEventListener('keyup', () => {
        reload_review();
    })


    formPengajuan.addEventListener('submit', function(e) {
        tinyMCE.triggerSave();

        let isi = tinyMCE.activeEditor.getContent().trim();
        isi = isi
            .replace(/^(<p><br><\/p>|<br\s*\/?>)+/gi, '')
            .replace(/(<p><br><\/p>|<br\s*\/?>)+$/gi, '');

        document.getElementById('txtarea_template').value = isi;
    });
</script>


<?= $this->endSection(); ?>