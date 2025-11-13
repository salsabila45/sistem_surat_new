<!--

=========================================================
* Argon Dashboard 2 Tailwind - v1.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-tailwind
* Copyright 2022 Creative Tim (https://www.creative-tim.com)

* Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/img/apple-icon.png') ?>" />
    <link rel="icon" type="image/png" href="<?= base_url('/assets/img/logos/logo_desa.webp') ?>" />
    <title>Layanan Surat Desa Gambarsari</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/490a850dc0.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="<?= base_url('assets/css/nucleo-icons.css') ?>" rel="stylesheet" />
    <link href="<?= base_url('assets/css/nucleo-svg.css') ?>" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->

    <link href="<?= base_url('assets/css/argon-dashboard-tailwind.css?v=1.0.1') ?>" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <script src="https://cdn.tiny.cloud/1/m5zhallne3hpb2i58khm58rw80en2g9tgj1ami9wy9e99otb/tinymce/8/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>
</head>

<body class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
    <div class="absolute w-full bg-blue-500  min-h-75"></div>
    <!-- sidenav  -->
    <?php if ($user['role'] == 'masyarakat') : ?>
        <?= $this->include('components/masyarakat_sidebar') ?>
    <?php elseif ($user['role'] == 'admin') : ?>
        <?= $this->include('components/admin_sidebar') ?>
    <?php elseif ($user['role'] == 'penulis') : ?>
        <?= $this->include('components/penulis_sidebar') ?>
    <?php endif ?>
    <!-- end sidenav -->

    <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
        <!-- Navbar -->
        <?= $this->include('components/navbar') ?>
        <!-- end Navbar -->

        <!-- cards -->
        <?= $this->renderSection('content') ?>
        <!-- end cards -->

        <footer class="pt-12">
            <div class="w-full px-6 mx-auto">
                <div class="flex flex-wrap items-center -mx-3 justify-center">
                    <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                        <div class="text-sm leading-normal text-center text-slate-500">
                            ©
                            <script>
                                document.write(new Date().getFullYear() + ",");
                            </script>
                            <?= $siteName['value'] ?>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </main>
</body>

<?= $this->renderSection('script'); ?>
<!-- plugin for charts  -->
<script src="<?= base_url('assets/js/plugins/chartjs.min.js') ?>" async></script>
<!-- plugin for scrollbar  -->
<script src="<?= base_url('assets/js/plugins/perfect-scrollbar.min.js') ?>" async></script>
<!-- main script file  -->
<script src="<?= base_url('assets/js/argon-dashboard-tailwind.js?v=1.0.1') ?>" async></script>

</html>