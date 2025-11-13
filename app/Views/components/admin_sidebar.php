<aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0" aria-expanded="false">

    <div class="h-19">
        <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times  text-slate-400 xl:hidden" sidenav-close></i>
        <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap  text-slate-700" href="/" target="_blank">
            <img src="<?= $siteLogo['value'] ?>" class="inline h-full max-w-full transition-all duration-200  ease-nav-brand max-h-8" alt="main_logo" /> <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand uppercase"><?= $siteName['value'] ?></span>
        </a>
    </div>

    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

    <div class="items-center block w-auto grow basis-full">
        <ul class="flex flex-col pl-0 mb-0">
            <?php foreach ($sidebarMenu as $menu): ?>
                <li class="mt-0.5 w-full">
                    <a class="py-2.7 <?= $halamanIni['url'] == $menu['url'] ? 'bg-blue-500/13' : '' ?>  dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors" href="<?= $menu['url'] ?>">
                        <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal <?= $halamanIni['url'] == $menu['url'] ? 'text-blue-500' : 'text-slate-500' ?> ni <?= $menu['icon'] ?>"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease"><?= $menu['nama_menu'] ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="mx-4">
        <!-- load phantom colors for card after: -->
        <p class="invisible hidden text-gray-800 text-red-500 text-red-600 text-blue-500 dark:bg-white bg-slate-500 bg-gray-500/30 bg-cyan-500/30 bg-emerald-500/30 bg-orange-500/30 bg-red-500/30 after:bg-gradient-to-tl after:from-zinc-800 after:to-zinc-700 dark:bg-gradient-to-tl dark:from-slate-750 dark:to-gray-850 after:from-blue-700 after:to-cyan-500 after:from-orange-500 after:to-yellow-500 after:from-green-600 after:to-lime-400 after:from-red-600 after:to-orange-600 after:from-slate-600 after:to-slate-300 text-emerald-500 text-cyan-500 text-slate-400"></p>
        <a href="/logout" class="inline-block w-full px-8 py-2 mb-4 text-xs font-bold leading-normal text-center text-white capitalize transition-all ease-in rounded-lg shadow-md bg-slate-700 bg-150 hover:shadow-xs hover:-translate-y-px">Logout</a>
    </div>
</aside>