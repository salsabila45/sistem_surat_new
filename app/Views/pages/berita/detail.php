<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<div class="w-full lg:w-11/12 mx-auto grid grid-cols-1 sm:grid-cols-12 mt-8 lg:mt-12">
    <div class="col-span-9 px-4 g:px-12 py-8 lg:mr-4 shadow-md mb-6">
        <h2 class="text-center mb-3"><?= $detailBerita['judul'] ?></h2>
        <p class="text-center">Diunggah oleh <span class="font-semibold"><?= $detailBerita['nama_penulis'] ?></span> | pada <?= date('d/m/Y', strtotime($detailBerita['created_at'])) ?> | <span class="font-semibold"><?= $detailBerita['kategori'] ?></span></p>
        <img src="/uploads/berita/<?= $detailBerita['gambar'] ?>" class="w-full aspect-video object-cover! mb-4 rounded-lg shadow-none transition transition-shadow duration-500 ease-in-out group-hover:shadow-lg" alt="Gambar Berita">
        <div class="mt-6">
            <?= $detailBerita['isi'] ?>
        </div>
    </div>

    <!-- <div class="col-span-1"></div> -->

    <div class="col-span-3 px-4 lg:px-6 py-8 lg:ml-4 shadow-md">
        <h4 class="font-semibold text-xl mb-6 text-gray-800">Berita Desa Terbaru</h4>
        <div class="w-full grid grid-cols-1 gap-3">
            <?php foreach ($dataBerita as $berita): ?>
                <div>
                    <a href="/berita/<?= $berita['slug'] ?>">
                        <img src="/uploads/berita/<?= $berita['gambar'] ?>" class="w-full aspect-video object-cover! mb-4 rounded-lg shadow-none transition transition-shadow duration-500 ease-in-out group-hover:shadow-lg" alt="Gambar Berita">
                        <div class="flex items-center">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-md text-xs font-semibold text-white font-display mr-2 capitalize bg-gray-400">
                                <?= $berita['kategori'] ?>
                            </span>
                            <p class="font-mono text-xs font-normal opacity-75 text-black mb-0"><?= date('d/m/Y', strtotime($berita['created_at'])) ?></p>
                        </div>
                        <a href="#"
                            class="text-gray-900 inline-block font-semibold text-md my-2 hover:text-indigo-600 transition duration-500 ease-in-out"> <?= $berita['judul'] ?></a>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>