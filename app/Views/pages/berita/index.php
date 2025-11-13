<?= $this->extend('layouts/layout') ?>
<?= $this->section('content') ?>
<div class="w-full">
    <h5 class="font-semibold text-lg mb-4 mt-12 text-gray-800">Berita Desa Gambarsari</h5>
    <div class="w-full grid grid-cols-1 lg:grid-cols-4 gap-5">
        <?php foreach ($dataBerita as $berita): ?>
            <div class="">
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
<?= $this->endSection() ?>