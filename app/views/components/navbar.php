<header class="lg:px-16 px-4 bg-[#4CAF50] flex flex-wrap items-center py-1 text-white">
    <div class="flex-1 flex justify-between items-center">
        <div class="flex justify-center items-center">

            <img src="<?php echo BASE_URL; ?>/images/logo_tpq.png" alt="Logo TPQ" class="w-16" />
            <a href="#" class="text-xl font-bold">TPQ Al-Hikmah Universitas Jember</a>
        </div>
    </div>

    <label for="menu-toggle" class="pointer-cursor md:hidden block">
        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
            <title>menu</title>
            <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
        </svg>
    </label>
    <input class="hidden" type="checkbox" id="menu-toggle" />

    <div class="hidden md:flex md:items-center md:w-auto w-full" id="menu">
        <nav>
            <ul class="md:flex items-center justify-between text-base text-white pt-4 md:pt-0">
                <li><a class="md:p-4 py-3 px-0 block" href="#">Beranda</a></li>
                <li><a class="md:p-4 py-3 px-0 block" href="#">Kelas</a></li>
                <li><a class="md:p-4 py-3 px-0 block" href="#">Kegiatan</a></li>
                <li><a href="#_" class="inline-block flex justify-center items-center gap-3 px-5 py-2 mx-auto text-white bg-white rounded-full hover:bg-gray-100 md:mx-0 !text-green-500">
                        <span><svg width="18px" height="18px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.5 7.063C16.5 10.258 14.57 13 12 13c-2.572 0-4.5-2.742-4.5-5.938C7.5 3.868 9.16 2 12 2s4.5 1.867 4.5 5.063zM4.102 20.142C4.487 20.6 6.145 22 12 22c5.855 0 7.512-1.4 7.898-1.857a.416.416 0 0 0 .09-.317C19.9 18.944 19.106 15 12 15s-7.9 3.944-7.989 4.826a.416.416 0 0 0 .091.317z" fill="#4CAF50"></path>
                                </g>
                            </svg></span>

                        Masuk ke Akun</a></li>
            </ul>
        </nav>
    </div>
</header>