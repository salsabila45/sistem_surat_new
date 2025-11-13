<?= $this->extend('layouts/layout') ?>

<?= $this->section('content') ?>
<div class="z-1 mx-auto py-5 sm:py-6 md:py-8 relative">
    <div class="shadow-lg w-full lg:w-10/12! xl:w-8/12! rounded-lg p-6 lg:p-8 mx-auto">
        <div class="flex flex-col w-full max-w-full mx-auto lg:mx-0 shrink-0 md:flex-0">
            <div class="relative flex flex-col min-w-0 break-words bg-white lg:py-4 dark:bg-gray-950 rounded-2xl bg-clip-border">
                <div class="">
                    <h3 class="text-center mb-6 text-2xl! xl:text-3xl!">Sejarah Desa Gambarsari</h3>
                    <img src="<?= $gambarDesa ?>" alt="sejarah gambarsari" class="w-full object-cover! aspect-video">
                    <!-- Profil Desa -->
                    <div class="mb-4 mt-6">
                        <?= $sejarahDesa ?>
                    </div>

                    <!-- Visi -->
                    <h5 class="font-semibold text-center text-lg mb-2 text-gray-800">Visi</h5>
                    <p class="text-center italic text-sm mb-4">
                        <?= $visiDesa ?>
                    </p>

                    <!-- Misi -->
                    <h5 class="font-semibold text-center text-lg mb-2 text-gray-800">Misi</h5>
                    <div class="text-center mb-4">
                        <?= $misiDesa ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>