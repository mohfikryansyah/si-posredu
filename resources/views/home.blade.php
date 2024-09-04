<x-guest-layout>


    <nav class=" bg-purple-400">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Posredu</span>
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
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-purple-400 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-100 md:p-0 dark:text-white md:dark:text-blue-500"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-gray-100 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-gray-100 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a>
                    </li>
                    <li>
                        <a href="#jadwal_pelayanan"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-gray-100 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-gray-100 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="w-full bg-purple-400 md:p-0 px-5">
        <div class="max-w-7xl mx-auto md:pt-20 pt-10">
            <div class="md:flex w-full">
                <div class="py-2 pr-12 max-w-screen-md mx-auto lg:py-16">
                    <h1
                        class="mb-4 text-3xl font-nunito font-black tracking-tight leading-none text-gray-900 md:text-3xl lg:text-5xl dark:text-white">
                        Selamat Datang di Website POSREDU</h1>
                    <h1
                        class="mb-4 text-3xl font-nunito font-black tracking-tight leading-none text-gray-900 md:text-3xl lg:text-5xl dark:text-white">
                    </h1>
                    <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">Here
                        at Flowbite we focus on markets where technology, innovation, and capital can unlock long-term
                        value
                        and drive economic growth.</p>
                    <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0">
                        <a href="#"
                            class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                            Get started
                            <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                        <a href="#"
                            class="py-3 px-5 sm:ms-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-70">
                            Learn more
                        </a>
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

    <div class="w-full mt-60 mb-28">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-center text-4xl mb-10 font-black font-nunito">PROFIL POSREDU</h1>
            <p class="text-xl mb-3 text-gray-700">Posredu adalah sebuah inisiatif kesehatan terpadu yang menggabungkan
                tiga layanan
                utama dalam satu platform: Posyandu, Posremaja, dan Posbindu. Program ini bertujuan untuk menyediakan
                layanan kesehatan yang menyeluruh bagi semua kelompok usia, mulai dari balita hingga lansia, dengan
                pendekatan yang holistik dan terintegrasi.
            </p>
            <p class="text-xl text-gray-700">Posredu hadir untuk menjawab kebutuhan masyarakat akan pelayanan kesehatan
                yang
                terintegrasi dan mudah diakses, dengan fokus pada pencegahan dan edukasi. Melalui Posredu, kami
                berkomitmen untuk menjaga kesehatan seluruh anggota keluarga Anda, dari yang termuda hingga yang tertua.
            </p>
        </div>
    </div>

    <div id="jadwal_pelayanan" class="w-full mb-16">
        <div class="max-w-7xl mx-auto">
            <h1 class="text-center text-4xl mb-10 font-black font-nunito">JADWAL PELAYANAN</h1>
            <div class="md:flex space-x-10 justify-center">
                <img src="{{ asset('images/pelayanan.png') }}" class="w-96 h-96" alt=""
                    srcset="{{ asset('images/pelayanan.png') }}">
                <div>
                    @foreach ($pelayanans as $pelayanan)
                        <div class="mb-3">
                            <h1 class="text-purple-500 text-2xl font-medium">
                                {{ $pelayanan->nama . ' - ' . '24 Maret 2004' }}</h1>
                            <h4 class="text-gray-500 text-md font-medium">
                                {{ 'Mulai pukul ' . $pelayanan->start . ' - ' . $pelayanan->end . ' WITA' }}</h4>
                            <p class="text-gray-800 text-lg mt-2">{{ $pelayanan->deskripsi }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div id="dokumentasi" class="w-full mt-60 mb-16">
        <div class="max-w-7xl mx-auto overflow-hidden">
            <h1 class="text-center text-4xl mb-10 font-black font-nunito">DOKUMENTASI KEGIATAN</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 md:px-0 px-4">
                <div>
                    <img class="myImg h-auto max-w-full rounded-lg cursor-pointer hover:-mt-3 duration-300"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg" alt="">
                </div>
                <div>
                    <img class="myImg h-auto max-w-full rounded-lg cursor-pointer hover:-mt-3 duration-300"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
                </div>
                <div>
                    <img class="myImg h-auto max-w-full rounded-lg cursor-pointer hover:-mt-3 duration-300"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
                </div>
                <div>
                    <img class="myImg h-auto max-w-full rounded-lg cursor-pointer hover:-mt-3 duration-300"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg" alt="">
                </div>
                <div>
                    <img class="myImg h-auto max-w-full rounded-lg cursor-pointer hover:-mt-3 duration-300"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg" alt="">
                </div>
                <div>
                    <img class="myImg h-auto max-w-full rounded-lg cursor-pointer hover:-mt-3 duration-300"
                        src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-5.jpg" alt="">
                </div>
            </div>

        </div>
        <div id="myModal" class="modal">
            <!-- Konten Modal -->
            <span class="close">&times;</span>
            <img class="modal-content" id="img01">
            <div id="caption"></div>
        </div>
    </div>

    <div class="w-full mt-60 mb-16">
        <div class="max-w-5xl mx-auto">
            <h1 class="text-center text-4xl mb-10 font-black font-nunito">JADWAL PELAYANAN</h1>
            <div class="bg-white shadow-sm rounded-lg md:mb-5 p-5">
                <h2 class="text-center text-gray-700 font-semibold md:text-xl text-lg mb-3">
                    Data Petugas
                </h2>
                <div id="line-charts" class="h-100"></div>
            </div>
        </div>
    </div>

    <div class="w-full mt-60 mb-16">
        <div class="max-w-5xl mx-auto">
            <h1 class="text-center text-4xl mb-10 font-black font-nunito">VISI MISI KAMI</h1>
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
    </div>



    <x-slot:script>
        <script>
            // Mendapatkan modal
            var modal = document.getElementById("myModal");

            // Mendapatkan semua gambar dengan kelas "myImg"
            var images = document.querySelectorAll(".myImg");
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");

            // Menambahkan event listener untuk setiap gambar
            images.forEach(function(img) {
                img.onclick = function() {
                    modal.style.display = "block";
                    modalImg.src = this.src;
                    captionText.innerHTML = this.alt;
                    // Menambahkan kelas 'modal-open' pada body untuk menonaktifkan scroll
                    document.body.classList.add("modal-open");
                }
            });

            // Mendapatkan elemen close
            var span = document.getElementsByClassName("close")[0];

            // Menutup modal saat tombol 'close' diklik
            span.onclick = function() {
                modal.style.display = "none";
                // Menghapus kelas 'modal-open' dari body untuk mengembalikan scroll
                document.body.classList.remove("modal-open");
            }
        </script>
        <script>
            gsap.registerPlugin(ScrollTrigger);
            gsap.defaults({
                ease: "none",
                duration: 2
            });

            const tl = gsap.timeline();
            tl.from(".blue", {
                    xPercent: -100
                })
                .from(".yellow", {
                    xPercent: 100
                })
                .from(".green", {
                    yPercent: -100
                });

            ScrollTrigger.create({
                animation: tl,
                trigger: "#container",
                start: "top top",
                end: "+=4000",
                scrub: true,
                pin: true,
                anticipatePin: 1
            })


            gsap.to('.rolling', {
                scrollTrigger: {
                    trigger: ".rolling",
                    scrub: true,
                    start: "bottom bottom",
                },
                x: 1024,
            });


            var dataPetugas = {!! $data !!}
            var data = [{
                    y: '2006',
                    a: 10,
                    b: 90
                },
                {
                    y: '2007',
                    a: 75,
                    b: 65
                },
                {
                    y: '2008',
                    a: 50,
                    b: 40
                },
                {
                    y: '2009',
                    a: 75,
                    b: 65
                },
                {
                    y: '2010',
                    a: 50,
                    b: 40
                },
                {
                    y: '2011',
                    a: 75,
                    b: 65
                },
                {
                    y: '2012',
                    a: 100,
                    b: 90
                }
            ]

            var updateData = data.map(function(item, index) {
                return {
                    y: item.y,
                    a: dataPetugas[index],
                    b: item.b,
                };
            });

            new Morris.Line({
                element: 'line-charts',
                data: updateData,
                xkey: 'y',
                ykeys: ['a', 'b'],
                labels: ['Total Sales', 'Total Revenue'],
                lineColors: ['#ff9b44', '#fc6075'],
                lineWidth: '3px',
                resize: true,
                redraw: true
            });
        </script>
    </x-slot:script>
    {{-- <x-slot:script>
        <script>
            document.addEventListener("DOMContentLoaded", (event) => {
                gsap.to('#bayi', {
                    rotation: 360,
                    duration: 10,
                });
            });
        </script>
    </x-slot:script> --}}


</x-guest-layout>
