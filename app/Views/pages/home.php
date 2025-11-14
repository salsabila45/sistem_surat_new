<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>
<div class="bg-top relative flex items-start pt-10 mx-0 pb-12 m-4 overflow-hidden bg-cover rounded-xl bg-[url('<?= base_url($ilustrasiDesa) ?>')]">
    <img src="<?= $ilustrasiDesa ?>" alt="" class="w-0 h-0 absolute hidden">
    <span class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-zinc-800 to-zinc-700 opacity-60"></span>
    <div class="container z-10">
        <div class="flex flex-wrap justify-center -mx-3">
            <div class="w-full max-w-full px-3 mx-auto mt-0 text-center lg:flex-0 shrink-0 lg:w-5/12">
                <h3 class="mt-12 mb-2 text-2xl text-white"><?= $judulSambutan ?></h3>
                <p class="text-white"><?= $subJudulSambutan ?></p>
                <a href="/login" class="mt-4 inline-block px-6 py-3 font-bold text-center text-black uppercase align-middle transition-all rounded-lg cursor-pointer bg-white leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md">Akses Layanan</a>
            </div>
        </div>
    </div>
</div>

<div class="z-1 mx-auto py-5 sm:py-6 md:py-8 relative">
    <div class="grid grid-cols-1 sm:grid-cols-12 ">
        <div class="col-span-3 md:col-span-8 lg:col-span-6">
            <div class="flex flex-col w-full max-w-full mx-auto lg:mx-0 shrink-0 md:flex-0">
                <div class="relative flex flex-col min-w-0 break-words bg-white lg:py-4 dark:bg-gray-950 rounded-2xl bg-clip-border">
                    <div class="">
                        <!-- Profil Desa -->
                        <h5 class="font-semibold text-lg mb-2 text-gray-800">Profil Desa</h5>
                        <div class="mb-4">
                            <?= $sejarahDesa ?>
                        </div>

                        <!-- Visi -->
                        <h5 class="font-semibold text-lg mb-2 text-gray-800">Visi</h5>
                        <p class="italic text-sm mb-4">
                            <?= $visiDesa ?>
                        </p>

                        <!-- Misi -->
                        <h5 class="font-semibold text-lg mb-2 text-gray-800">Misi</h5>
                        <div class="mb-4">
                            <?= $misiDesa ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-1"></div>

        <div class="col-span-3 md:col-span-4 lg:col-span-5">
            <h5 class="font-semibold text-lg mb-2 text-gray-800">Berita Terbaru</h5>
            <div class="w-full grid grid-cols-1 lg:grid-cols-2 gap-5">
                <?php foreach ($dataBerita as $berita): ?>
                    <div class="">
                        <a href="<?= $berita['slug'] ?>">
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
</div>
<?= $this->endSection() ?>