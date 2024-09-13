<x-guest-layout>
    <nav class=" bg-purple-400">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="{{ env('APP_URL') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('images/logo.png') }}" class="h-8" alt="Flowbite Logo" />
                <span
                    class="self-center text-2xl font-semibold font-abyssinica text-gray-800 whitespace-nowrap dark:text-white">{{ $app['app_name'] }}</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul id="navbar"
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-purple-400 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-gray-100 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#profil"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-gray-100 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Profil</a>
                    </li>
                    <li>
                        <a href="#jadwal_pelayanan"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-gray-100 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Layanan</a>
                    </li>
                    <li>
                        <a href="#artikel"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-gray-100 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Artikel</a>
                    </li>
                    <li>
                        <a href="#galeri"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-gray-100 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Galeri</a>
                    </li>
                    <li>
                        <a href="#kontak"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-gray-100 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="w-full bg-purple-400 md:p-0 px-5">
        <div class="max-w-7xl mx-auto md:pt-20 pt-10">
            <div class="md:flex w-full">
                <div class="py-2 pr-12 max-w-screen-md mx-auto lg:py-16">
                    <h1 class="mb-4 text-3xl font-nunito font-black tracking-tight text-gray-800 md:text-3xl lg:text-5xl dark:text-white"
                        style="line-height: 1.2;">
                        Selamat Datang di Sistem Informasi <span id="posredu"></span></h1>
                    {{-- <h1
                        class="mb-4 text-3xl font-nunito font-black tracking-tight leading-none text-gray-900 md:text-3xl lg:text-5xl dark:text-white">
                        awdwa
                    </h1> --}}
                    <p class="mb-8 text-lg font-normal text-gray-200 lg:text-xl dark:text-gray-400">POSREDU menyediakan
                        layanan kesehatan menyeluruh untuk anak, ibu hamil, remaja, dan lansia guna mendukung kualitas
                        hidup dan kesejahteraan masyarakat.</p>
                    <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0">
                        @auth
                        <a href="{{ route('login') }}"
                            class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 dark:focus:ring-green-900">
                            DASHBOARD
                            <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                        @endauth
                        @guest
                        <a href="{{ route('login') }}"
                            class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-green-300 dark:focus:ring-green-900">
                            SIGN IN
                            <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                        @endguest
                        {{-- <a href=""
                            class="py-3 px-5 sm:ms-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-70">
                            Learn more
                        </a> --}}
                    </div>
                </div>
                <div class="py-8 w-full items-center justify-center flex">
                    <img src="{{ asset('images/kesehatan.png') }}" id="bayi" class="animate-bounce" alt=""
                        srcset="{{ asset('images/kesehatan.png') }}">
                </div>
            </div>
        </div>
    </div>

    <div class="w-full absolute">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ac94fa" fill-opacity="1"
                d="M0,128L60,117.3C120,107,240,85,360,80C480,75,600,85,720,106.7C840,128,960,160,1080,160C1200,160,1320,128,1380,112L1440,96L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z">
            </path>
        </svg>
    </div>

    <div id="profil" class="w-full md:mt-36 pt-20 mt-28 px-5">
        <div class="max-w-7xl mx-auto" data-aos="fade-up" data-aos-anchor-placement="top-center">
            <h1 class="text-center md:text-4xl text-2xl mb-6 font-black font-nunito">PROFIL POSREDU</h1>
            <p class="text-lg mb-3 text-gray-700 text-center">Posredu adalah sebuah inisiatif kesehatan terpadu yang menggabungkan
                tiga layanan
                utama dalam satu platform: Posyandu, Posremaja, dan Posbindu. Program ini bertujuan untuk menyediakan
                layanan kesehatan yang menyeluruh bagi semua kelompok usia, mulai dari balita hingga lansia, dengan
                pendekatan yang holistik dan terintegrasi.
            </p>
            <p class="text-lg text-gray-700 text-center">Posredu hadir untuk menjawab kebutuhan masyarakat akan pelayanan kesehatan
                yang
                terintegrasi dan mudah diakses, dengan fokus pada pencegahan dan edukasi. Melalui Posredu, kami
                berkomitmen untuk menjaga kesehatan seluruh anggota keluarga Anda, dari yang termuda hingga yang tertua.
            </p>
            <div class="grid md:grid-cols-4 grid-cols-2 md:gap-5 gap-y-10 items-center mt-8">
                <div class="text-center space-y-1">
                    <span id="total-anak" data-count="{{ $dataPemeriksaan['anak'] }}"
                        class="count-up text-6xl text-purple-700 font-atma font-bold">{{ $dataPemeriksaan['anak'] }}</span>
                    <p class="text-xl text-gray-700">Total Anak</p>
                </div>
                <div class="text-center space-y-1 top-0">
                    <span id="total-ibu" data-count="{{ $dataPemeriksaan['ibu'] }}"
                        class="count-up text-6xl text-purple-700 font-atma font-bold">{{ $dataPemeriksaan['ibu'] }}</span>
                    <p class="text-xl text-gray-700">Total Ibu Hamil</p>
                </div>
                <div class="text-center space-y-1">
                    <span id="total-remaja" data-count="{{ $dataPemeriksaan['remaja'] }}"
                        class="count-up text-6xl text-purple-700 font-atma font-bold">{{ $dataPemeriksaan['remaja'] }}</span>
                    <p class="text-xl text-gray-700">Total Remaja</p>
                </div>
                <div class="text-center space-y-1">
                    <span id="total-lansia" data-count="{{ $dataPemeriksaan['lansia'] }}"
                        class="count-up text-6xl text-purple-700 font-atma font-bold">{{ $dataPemeriksaan['lansia'] }}</span>
                    <p class="text-xl text-gray-700">Total Lansia</p>
                </div>
            </div>
        </div>
    </div>


    <div id="jadwal_pelayanan" class="w-full md:mt-14 pt-20 px-5">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-center md:text-4xl text-2xl mb-8 font-black font-nunito">JADWAL PELAYANAN</h1>
            <div class="md:flex space-x-10 justify-center">
                @if ($pelayanans->isNotEmpty())
                    <img src="{{ asset('images/pelayanan.png') }}" data-aos="fade-right" data-aos-offset="300"
                        class="w-96 h-96" alt="" srcset="{{ asset('images/pelayanan.png') }}">
                @endif
                @forelse ($pelayanans as $pelayanan)
                    <div data-aos="fade-left" data-aos-offset="300" class="mb-3">
                        <h1 class="text-purple-500 text-2xl font-medium">
                            {{ $pelayanan->nama . ' - ' . date_format(date_create($pelayanan->tanggal_pelayanan), 'd F, Y') }}
                        </h1>
                        <h4 class="text-gray-500 text-md font-medium">
                            {{ 'Mulai pukul ' . $pelayanan->start . ' - ' . $pelayanan->end . ' WITA' }}</h4>
                        <p class="text-gray-800 text-lg mt-2">{{ $pelayanan->deskripsi }}</p>
                    </div>
                @empty
                    <x-empty>Saat ini belum ada jadwal layanan yang tersedia untuk ditampilkan.</x-empty>
                @endforelse
            </div>
        </div>
    </div>
    </div>

    <div id="artikel" class="w-full md:mt-14 pt-20 px-5">
        <div class="max-w-7xl mx-auto overflow-hidden">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-center md:text-4xl text-2xl font-black font-nunito">ARTIKEL</h1>
                <a href="{{ route('blog') }}"
                    class="text-center hover:text-blue-400 duration-150 text-xm font-medium font-nunito">Lihat Semua<i
                        class="ms-3 fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 md:px-0 group">
                @forelse ($posts as $post)
                    <div data-aos="fade-up"
                        class="bg-gray-100  rounded-lg shadow-lg group-hover:[&:not(:hover)]:blur-sm transition duration-300 overflow-hidden">
                        <div class="h-[200px] overflow-hidden relative">
                            <span
                                class="bg-black/50 z-10 rounded-bl-lg rounded-tr-lg right-0 absolute px-3 p-1 text-gray-100">{{ $post->category->title }}</span>
                            @if ($post->thumbnail)
                                <img class="h-[220px] w-full rounded-lg hover:scale-105 duration-300"
                                    src="{{ asset('storage/' . $post->thumbnail) }}" alt="">
                            @else
                                <img class="w-full h-[220px] rounded-lg hover:scale-105 duration-300"
                                    src="{{ asset('images/no-thumbnail.jpg') }}" alt="">
                            @endif
                        </div>
                        <div class="px-5 py-3">
                            <h2 class="text-gray-500 mb-2 text-sm">{{ date_format($post->created_at, 'd F, Y') }}</h2>
                            <a href="{{ route('blog.show', ['post' => $post->slug]) }}"
                                class="text-gray-800 font-medium text-lg hover:text-blue-400 duration-150">{{ Str::limit($post->title, 87) }}</a>
                            {{-- <div id="body-artikel" class="my-2 text-gray-800 text-md">
                                {!! Str::limit($post->body, 100) !!}
                            </div> --}}
                        </div>
                    </div>
                @empty
                    <x-empty>Saat ini belum ada artikel yang tersedia untuk ditampilkan.</x-empty>
                @endforelse
            </div>
        </div>
    </div>

    @if ($galleries->isNotEmpty())
        <div id="galeri" class="w-full md:mt-28 pb-20 pt-10 overflow-hidden">
            <h1 class="text-center md:text-4xl text-2xl mb-10 font-black font-nunito">DOKUMENTASI KEGIATAN</h1>
            <div class="max-w-screen-xl mx-auto overflow-hidden">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach ($galleries as $gallery)
                            <div class="swiper-slide">
                                <img src="{{ asset('storage/' . $gallery->path) }}" alt="Movie 1">
                                <div class="slide-caption">
                                    <h3>{{ $gallery->title }}</h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    @endif


    <div id="visi_misi" class="w-full md:mt-14 pt-20">
        <div class="max-w-7xl mx-auto overflow-hidden">
            <h1 class="text-center md:text-4xl text-2xl md:mb-10 mb-3 font-black font-nunito">VISI DAN MISI</h1>
            <div data-aos="fade-up" class="p-5 md:p-0">
                <h2 class="text-center md:text-4xl text-2xl font-atma italic text-blue-500">Layanan, Inovasi, Edukasi!
                </h2>
                <p class="max-w-screen-lg mx-auto text-center md:text-2xl my-3 italic">{{ $app['visi'] }}</p>
            </div>
            <div class="max-w-screen-lg mx-auto md:mt-5 mt-0 md:p-0 p-5 md:grid grid-cols-3 gap-5 md:space-y-0 space-y-3">
                <div data-aos="fade-right" data-aos-offset="400" class="border border-gray-200 p-5 rounded-3xl">
                    <div class="">
                        <img src="{{ asset('images/layanan.png') }}" class="w-40 h-40 mx-auto" alt="">
                        <h1 class="text-center text-4xl font-atma italic text-blue-500">Layanan</h1>
                    </div>
                    <p class="text-center text-lg mt-3">{{ $app['misi1'] }}</p>
                </div>
                <div data-aos="fade-up" data-aos-offset="400" class="border border-gray-200 p-5 rounded-3xl">
                    <div class="">
                        <img src="{{ asset('images/inovasi.png') }}" class="w-40 h-40 mx-auto" alt="">
                        <h1 class="text-center text-4xl font-atma italic text-blue-500">Inovasi</h1>
                    </div>
                    <p class="text-center text-lg mt-3">{{ $app['misi2'] }}</p>
                </div>
                <div data-aos="fade-left" data-aos-offset="400" class="border border-gray-200 p-5 rounded-3xl">
                    <div class="">
                        <img src="{{ asset('images/edukasi.png') }}" class="w-40 h-40 mx-auto" alt="">
                        <h1 class="text-center text-4xl font-atma italic text-blue-500">Edukasi</h1>
                    </div>
                    <p class="text-center text-lg mt-3">{{ $app['misi3'] }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="w-full mt-60 mb-16">
        <div class="max-w-5xl mx-auto">
            <h1 class="text-center md:text-4xl text-2xl mb-10 font-black font-nunito">VISI MISI KAMI</h1>
        </div>
    </div>

    <div id="container" class="w-full h-screen relative overflow-hidden">
        <div class="absolute w-full h-screen bg-red-200 flex items-center justify-center text-5xl">1. MEMBANGUN NEGERI
        </div>
        <div class="absolute blue w-full h-screen bg-blue-500 flex items-center justify-center text-5xl">
            <img class="h-auto max-w-full rounded-lg"
                src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg" alt="">
        </div>
        <div class="absolute yellow w-full h-screen bg-yellow-500 flex items-center justify-center text-5xl">3</div>
        <div class="absolute green w-full h-screen bg-green-500 flex items-center justify-center text-5xl">4</div>
    </div> --}}

    <div id="kontak" class="w-full md:mt-14 pt-20 mb-28 px-5">
        <div class="max-w-7xl mx-auto overflow-hidden">
            <h1 class="text-center md:text-4xl text-2xl mb-10 font-black font-nunito">KONTAK</h1>
            <div class="md:grid grid-cols-2 gap-5 items-center">
                <iframe data-aos="fade-right"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6683066868754!2d121.49255099999999!3d0.49685289999999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x327783717a001c0d%3A0xb21d86f9d9d41a51!2sPustu%20Desa%20Bunto!5e0!3m2!1sid!2sid!4v1725602171727!5m2!1sid!2sid"
                    width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div data-aos="fade-left" class="space-y-10 md:mt-0 mt-5">
                    <div class="flex space-x-3">
                        <div>
                            <div
                                class="w-14 h-14 rounded-full text-xl text-white bg-purple-400 flex items-center justify-center">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                        </div>
                        <div class="w-full">
                            <h2 class="text-2xl font-medium">Lokasi</h2>
                            <p>
                                {{ $app['lokasi'] }}
                            </p>
                        </div>
                    </div>
                    <div class="flex space-x-3">
                        <div>
                            <div
                                class="w-14 h-14 rounded-full text-xl text-white bg-purple-400 flex items-center justify-center">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                        </div>
                        <div class="w-full">
                            <h2 class="text-2xl font-medium">Email</h2>
                            <p>
                                {{ $app['email'] }}
                            </p>
                        </div>
                    </div>
                    <div class="flex space-x-3">
                        <div>
                            <div
                                class="w-14 h-14 rounded-full text-2xl text-white bg-purple-400 flex items-center justify-center">
                                <i class="fa-brands fa-whatsapp"></i>
                            </div>
                        </div>
                        <div class="w-full">
                            <h2 class="text-2xl font-medium">Whatsapp</h2>
                            <p>
                                {{ $app['no_tlp'] }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="p-4 bg-gray-100 md:p-8 lg:p-10 dark:bg-gray-800">
        <div class="mx-auto max-w-screen-xl text-center">
            <a href="{{ env('APP_URL') }}"
                class="flex justify-center items-center text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="h-14" src="{{ asset('images/logo.png') }}" alt="logo-posyandu">
            </a>
            <p class="my-6 text-gray-500 dark:text-gray-400">"Sehat itu pilihan: rawat diri, hidup lebih bahagia!"</p>
            <ul class="flex flex-wrap justify-center items-center mb-6 text-gray-900 dark:text-white">
                <li>
                    <a href="/" class="mr-4 hover:underline md:mr-6 ">Home</a>
                </li>
                <li>
                    <a href="#profil" class="mr-4 hover:underline md:mr-6">Profil</a>
                </li>
                <li>
                    <a href="#jadwal_layanan" class="mr-4 hover:underline md:mr-6 ">Layanan</a>
                </li>
                <li>
                    <a href="#artikel" class="mr-4 hover:underline md:mr-6">Artikel</a>
                </li>
                <li>
                    <a href="#galeri" class="mr-4 hover:underline md:mr-6">Galeri</a>
                </li>
                <li>
                    <a href="#kontak" class="mr-4 hover:underline md:mr-6">Kontak</a>
                </li>
                <li>
                    <a href="{{ route('login') }}" class="mr-4 hover:underline md:mr-6">Login</a>
                </li>
                <li>
                    <a href="{{ route('blog') }}" class="mr-4 hover:underline md:mr-6">Blog</a>
                </li>
            </ul>
            <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a
                    href="{{ env('APP_URL') }}" class="hover:underline">Sistem Informasi Posredu</a>. All Rights
                Reserved.</span>
        </div>
    </footer>

    <x-slot:script>
        <script src="{{ asset('js/home.js') }}"></script>
    </x-slot:script>
</x-guest-layout>
