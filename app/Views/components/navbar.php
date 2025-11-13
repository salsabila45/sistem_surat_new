   <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="false">
       <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
           <nav>
               <h6 class="mb-0 font-bold text-white capitalize"><?= $halamanIni['nama_menu'] ?? "" ?></h6>
           </nav>

           <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
               <div class="flex items-center md:ml-auto md:pr-4">
               </div>
               <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
                   <li class="flex items-center">
                       <a href="/logout" class="block px-0 py-2 text-sm font-semibold text-white transition-all ease-nav-brand">
                           <i class="fa fa-user sm:mr-1"></i>
                           <span class="hidden sm:inline">Logout</span>
                       </a>
                   </li>
                   <li class="flex items-center px-4">
                       <a href="/<?= $user['role'] == 'admin' ? 'admin' : 'masyarakat' ?>/profile" class="p-0 text-sm text-white transition-all ease-nav-brand">
                           <i class="cursor-pointer fa fa-cog"></i>
                       </a>
                   </li>
                   <li class="flex items-center pl-4 xl:hidden">
                       <a href="javascript:;" class="block p-0 text-sm text-white transition-all ease-nav-brand" sidenav-trigger>
                           <div class="w-4.5 overflow-hidden">
                               <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                               <i class="ease mb-0.75 relative block h-0.5 rounded-sm bg-white transition-all"></i>
                               <i class="ease relative block h-0.5 rounded-sm bg-white transition-all"></i>
                           </div>
                       </a>
                   </li>
               </ul>
           </div>
       </div>
   </nav>