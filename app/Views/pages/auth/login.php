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
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <title>Argon Dashboard 2 Tailwind by Creative Tim</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/490a850dc0.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Main Styling -->
    <link href="../assets/css/argon-dashboard-tailwind.css?v=1.0.1" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="m-0 font-sans antialiased font-normal bg-white text-start text-base leading-default text-slate-500">
    <nav class="fixed -top-2 left-1/2 -translate-x-1/2! w-11/12 lg:w-10/12 mx-auto z-30 flex flex-wrap items-center px-4 py-2 m-6 mb-0 shadow-sm rounded-xl bg-white/80 backdrop-blur-2xl backdrop-saturate-200 lg:flex-nowrap lg:justify-start">
        <div class="flex items-center justify-between w-full p-0 px-6 mx-auto flex-wrap-inherit">
            <!-- <a class="py-1.75 text-sm mr-4 ml-4 whitespace-nowrap font-bold text-slate-700 lg:ml-0" href="" target="_blank"> Argon Dashboard 2 </a> -->
            <img src="<?= $siteLogo['value'] ?>" alt="" class="w-12 h-12 object-cover">
            <button navbar-trigger="" class="px-3 py-1 ml-2 leading-none transition-all ease-in-out bg-transparent border border-transparent border-solid rounded-lg shadow-none cursor-pointer text-lg lg:hidden" type="button" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="inline-block mt-2 align-middle bg-center bg-no-repeat bg-cover w-6 h-6 bg-none">
                    <span bar1="" class="w-5.5 rounded-xs relative my-0 mx-auto block h-px bg-gray-600 transition-all duration-300"></span>
                    <span bar2="" class="w-5.5 rounded-xs mt-1.75 relative my-0 mx-auto block h-px bg-gray-600 transition-all duration-300"></span>
                    <span bar3="" class="w-5.5 rounded-xs mt-1.75 relative my-0 mx-auto block h-px bg-gray-600 transition-all duration-300"></span>
                </span>
            </button>
            <div navbar-menu="" class="items-center flex-grow transition-all duration-500 lg-max:overflow-hidden ease lg-max:max-h-0 basis-full lg:flex lg:basis-auto">
                <ul class="flex flex-col pl-0 mx-auto mb-0 list-none lg:flex-row xl:ml-auto">
                    <li>
                        <a class="flex items-center px-4 py-2 mr-2 font-normal transition-all ease-in-out lg-max:opacity-0 duration-250 text-sm text-slate-700 lg:px-2" aria-current="page" href="/">
                            Beranda
                        </a>
                    </li>
                    <li>
                        <a class="block px-4 py-2 mr-2 font-normal transition-all ease-in-out lg-max:opacity-0 duration-250 text-sm text-slate-700 lg:px-2" href="/berita">
                            Berita
                        </a>
                    </li>
                    <li>
                        <a class="block px-4 py-2 mr-2 font-normal transition-all ease-in-out lg-max:opacity-0 duration-250 text-sm text-slate-700 lg:px-2" href="/sejarah">
                            Sejarah
                        </a>
                    </li>
                </ul>
                <ul class="hidden pl-0 mb-0 list-none lg:block lg:flex-row">
                    <li>
                        <a href="/login" class="inline-block px-8 py-2 mb-0 mr-1 font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer hover:-translate-y-px hover:shadow-xs active:opacity-85 text-xs tracking-tight-rem">Akses Layanan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="mt-0 transition-all duration-200 ease-in-out">
        <section>
            <div class="relative flex items-center min-h-screen p-0 overflow-hidden bg-center bg-cover">
                <div class="container z-1">
                    <div class="flex flex-wrap -mx-3">
                        <div class="flex flex-col w-full max-w-full px-3 mx-auto lg:mx-0 shrink-0 md:flex-0 md:w-7/12 lg:w-5/12 xl:w-4/12">
                            <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none lg:py4 dark:bg-gray-950 rounded-2xl bg-clip-border">
                                <div class="flex-auto p-6">
                                    <?php if (!session('user')): ?>
                                        <form role="form" method="post" action="<?= site_url('login?type=' . $login_type) ?>">
                                            <?= view('components/alert') ?>
                                            <div class="tabs mb-4">
                                                <div class="flex">
                                                    <a href="/login?type=masyarakat" class="flex-1 inline-block px-6 py-3 mr-3 font-bold text-center text-blue-500 uppercase align-middle transition-all <?= $login_type == 'masyarakat' ? 'bg-transparent border border-blue-500' : '' ?> rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md">Login Masyarakat</a>
                                                    <a href="/login?type=admin" class="flex-1 flex items-center justify-center px-6 py-3 mr-3 font-bold text-center text-blue-500 uppercase align-middle transition-all <?= $login_type == 'admin' ? 'bg-transparent border border-blue-500' : '' ?> rounded-lg cursor-pointer bg-blue-500/0 leading-normal text-xs ease-in tracking-tight-rem bg-150 bg-x-25 hover:bg-blue-500/25 hover:-translate-y-px active:bg-blue/45">Login Admin</a>
                                                </div>
                                            </div>
                                            <?php if ($login_type == 'admin') : ?>
                                                <div class="mb-4">
                                                    <input type="text" name="username" placeholder="Username" class="focus:shadow-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 /80 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                                                </div>
                                                <div class="mb-4">
                                                    <input type="password" name="password" placeholder="Password" class="focus:shadow-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 /80 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                                                </div>
                                            <?php else : ?>
                                                <div class="mb-4">
                                                    <input type="text" name="nama" placeholder="Nama Lengkap" value="<?= old('nama') ?>" class="focus:shadow-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 /80 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                                                </div>
                                                <div class="mb-4">
                                                    <input type="date" name="tanggal_lahir" placeholder="Tanggal Lahir" class="focus:shadow-primary-outline dark:bg-gray-950 dark:placeholder:text-white/80 /80 text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding p-3 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-fuchsia-300 focus:outline-none" />
                                                </div>
                                            <?php endif; ?>
                                            <div class="text-center">
                                                <button type="submit"
                                                    class="inline-block w-full px-16 py-3.5 mt-6 mb-0 font-bold leading-normal text-center text-white align-middle transition-all bg-blue-500 border-0 rounded-lg cursor-pointer hover:-translate-y-px active:opacity-85 hover:shadow-xs text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25">
                                                    Masuk
                                                </button>
                                            </div>
                                        </form> <?php else: ?>
                                        <a href="/dashboard"
                                            class="inline-block w-full px-16 py-3.5 mt-6 mb-0 font-bold leading-normal text-center text-white align-middle transition-all bg-blue-500 border-0 rounded-lg cursor-pointer hover:-translate-y-px active:opacity-85 hover:shadow-xs text-sm ease-in tracking-tight-rem shadow-md bg-150 bg-x-25">
                                            Akses Layanan
                                        </a>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                        <div class="absolute top-0 right-0 flex-col justify-center hidden w-6/12 h-full max-w-full px-3 pr-0 my-auto text-center flex-0 lg:flex">
                            <img src="/assets/img/desa_gambarsari.jpg" alt="" class="w-0 h-0 absolute hidden">
                            <div class="relative flex flex-col justify-center h-full bg-cover px-24 m-4 overflow-hidden bg-[url('http://localhost:8080/assets/img/desa_gambarsari.jpg')] rounded-xl ">
                                <span class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-blue-500 to-violet-500 opacity-60"></span>
                                <h4 class="z-20 mt-12 font-bold text-white">"Layanan Pengajuan Surat"</h4>
                                <p class="z-20 text-white ">Ajukan surat perpindahan, surat keterangan tidak mampu dan lain lain tinggal klik klik.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
<script>
    setTimeout(() => {
        document.querySelectorAll('[role="alert"]').forEach(el => el.remove());
    }, 3000);
</script>
<!-- plugin for scrollbar  -->
<script src="../assets/js/plugins/perfect-scrollbar.min.js" async></script>
<!-- main script file  -->
<script src="../assets/js/argon-dashboard-tailwind.js?v=1.0.1" async></script>

</html>