<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center ">
            <h2 class="font-medium md:text-lg text-md text-gray-700 leading-tight">
                Welcome, {{ auth()->user()->name }}!
            </h2>

            <span id="tanggalwaktu" class="text-gray-400 md:text-lg text-md"></span>
        </div>
        <script>
            function updateClock() {
                // Dapatkan objek Date untuk waktu saat ini
                var now = new Date();

                // Ekstrak jam, menit, dan detik dari objek Date
                var hours = now.getHours();
                var minutes = now.getMinutes();
                var seconds = now.getSeconds();

                // Format waktu dalam format 12 jam
                var ampm = hours >= 12 ? 'PM' : 'AM';
                hours = hours % 12;
                hours = hours ? hours : 12; // Jam 0 akan dianggap sebagai 12

                // Buat string waktu dalam format HH:mm:ss AM/PM
                var timeString = hours + ':' + addLeadingZero(minutes) + ':' + addLeadingZero(seconds) + ' ' + ampm;

                // Tampilkan waktu di dalam elemen dengan id "digitalClock"
                document.getElementById('tanggalwaktu').innerText = timeString;
            }

            function addLeadingZero(number) {
                // Tambahkan nol di depan angka jika angka < 10
                return number < 10 ? '0' + number : number;
            }

            // Panggil fungsi updateClock setiap detik
            setInterval(updateClock, 1000);

            // Inisialisasi jam pada saat halaman dimuat
            updateClock();
        </script>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 md:gap-6 gap-4 my-4">
        <div class="px-6 rounded-lg shadow-sm bg-white h-[117px] dark:bg-gray-800 grid items-center">
            <div class="flex items-center justify-between">
                <div>
                    <div
                        class="flex items-center justify-center h-[60px] w-[60px] text-orange-400 bg-orange-2 float-left rounded-full">
                        <p class="text-xl">
                            <i class="fa-solid fa-children"></i>
                        </p>
                    </div>
                </div>
                <div class="grid grid-rows-2 items-center">
                    <p class="text-3xl text-right font-bold text-gray-700 dark:text-gray-500">
                        {{ App\Models\Anak::count() }}
                    </p>
                    <span class="text-[16px] font-medium text-gray-600 dark:text-gray-500">
                        Total Anak
                    </span>
                </div>
            </div>
        </div>
        <div class="px-6 rounded-lg shadow-sm bg-white h-[117px] dark:bg-gray-800 grid items-center">
            <div class="flex items-center justify-between">
                <div>
                    <div
                        class="flex items-center justify-center h-[60px] w-[60px] text-orange-400 bg-orange-2 float-left rounded-full">
                        <p class="text-xl">
                            <i class="fa-solid fa-person-breastfeeding"></i>
                        </p>
                    </div>
                </div>
                <div class="grid grid-rows-2 items-center">
                    <p class="text-3xl text-right font-bold text-gray-700 dark:text-gray-500">
                        {{ App\Models\Ibu::count() }}
                    </p>
                    <span class="text-[16px] font-medium text-gray-600 dark:text-gray-500">
                        Total Ibu Hamil
                    </span>
                </div>
            </div>
        </div>
        <div class="px-6 rounded-lg shadow-sm bg-white h-[117px] dark:bg-gray-800 grid items-center">
            <div class="flex items-center justify-between">
                <div>
                    <div
                        class="flex items-center justify-center h-[60px] w-[60px] text-orange-400 bg-orange-2 float-left rounded-full">
                        <p class="text-xl">
                            <i class="fa-solid fa-person-running"></i>
                        </p>
                    </div>
                </div>
                <div class="grid grid-rows-2 items-center">
                    <p class="text-3xl text-right font-bold text-gray-700 dark:text-gray-500">
                        {{ App\Models\Remaja::count() }}
                    </p>
                    <span class="text-[16px] font-medium text-gray-600 dark:text-gray-500">
                        Total Remaja
                    </span>
                </div>
            </div>
        </div>
        <div class="px-6 rounded-lg shadow-sm bg-white h-[117px] dark:bg-gray-800 grid items-center">
            <div class="flex items-center justify-between">
                <div>
                    <div
                        class="flex items-center justify-center h-[60px] w-[60px] text-orange-400 bg-orange-2 float-left rounded-full">
                        <p class="text-xl">
                            <i class="fa-solid fa-person-cane"></i>
                        </p>
                    </div>
                </div>
                <div class="grid grid-rows-2 items-center">
                    <p class="text-3xl text-right font-bold text-gray-700 dark:text-gray-500">
                        {{ App\Models\Lansia::count() }}
                    </p>
                    <span class="text-[16px] font-medium text-gray-600 dark:text-gray-500">
                        Total Lansia
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- CHART -->
    <div class="grid md:grid-cols-2 grid-cols-1 gap-5">
        <div class="bg-white shadow-sm rounded-lg md:mb-5 p-5">
            <h2 class="text-center text-gray-700 font-semibold md:text-xl text-lg mb-3">
                Data Petugas
            </h2>
            <div id="bar-charts" class="h-100"></div>
        </div>

        <div class="bg-white shadow-sm rounded-lg md:mb-5 p-5">
            <h2 class="text-center text-gray-700 font-semibold md:text-xl text-lg mb-3">
                Data Pemeriksaan
            </h2>
            <div id="line-charts" class="h-100"></div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 bg-white">
        <div class="border-r border-gray-200">
            <div class="grid grid-rows-3 grid-cols-1 px-4">
                <div class="row-span-1 flex justify-between mt-3">
                    <h1 class="font-medium">Pemeriksaan Ibu</h1>
                    @if ($persentasePerubahan > 0)
                        <h1 class="font-medium text-green-400">{{ round($persentasePerubahan, 2) }}%</h1>
                    @elseif ($persentasePerubahan < 0)
                        <h1 class="font-medium text-red-400">{{ round($persentasePerubahan, 2) }}%</h1>
                    @else
                        <h1 class="font-medium text-yellow-400">{{ round($persentasePerubahan, 2) }}%</h1>
                    @endif
                </div>
                <div class="row-span-1">
                    <h1 class="text-4xl font-bold">{{ $pemeriksaanBulanIni }}</h1>
                </div>
                <div class="row-span-1 mb-3 mt-1 items-center">
                    <div class="w-full bg-gray-200 rounded-full h-1.5 dark:bg-gray-700">
                        <div class="bg-blue-600 h-1.5 rounded-full progress-bar"
                            data-percentage="{{ $persentasePerubahan }}" style="width: 0;"></div>
                    </div>
                    <h1 class="text-gray-400 text-sm mt-1">Overall Pemeriksaan Ibu
                        {{ count(App\Models\PemeriksaanIbu::all()) }}</h1>
                </div>
            </div>
        </div>
        <div class="border-r border-gray-200 font-medium p-4"></div>
        <div class="border-r border-gray-200 font-medium p-4"></div>
        <div class="font-medium p-4"></div>
    </div>

    <div class="flex items-center justify-center h-48 mb-4 rounded bg-white mt-5 dark:bg-gray-800">
        <p class="text-2xl text-gray-400 dark:text-gray-500">
            <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 1v16M1 9h16" />
            </svg>
        </p>
    </div>


    <x-slot:script>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let progressBar = document.querySelector('.progress-bar');
                let targetPercentage = parseFloat(progressBar.getAttribute('data-percentage'));
                let currentPercentage = 0;

                function updateProgressBar(percentage) {
                    progressBar.style.width = percentage + '%';
                    // progressBar.textContent = percentage + '%';

                    // Change color based on percentage
                    if (percentage < 33) {
                        progressBar.style.backgroundColor = '#f44336'; // Red
                    } else if (percentage < 66) {
                        progressBar.style.backgroundColor = '#ff9800'; // Orange
                    } else if (percentage < 100) {
                        progressBar.style.backgroundColor = '#4caf50'; // Green
                    } else {
                        progressBar.style.backgroundColor = '#2196f3'; // Blue for 100%
                    }
                }

                let interval = setInterval(function() {
                    if (currentPercentage >= targetPercentage) {
                        clearInterval(interval);
                    } else {
                        currentPercentage++;
                        updateProgressBar(currentPercentage);
                    }
                }, 20);
            });
        </script>
        <script>
            $(function() {
                // Data dari Laravel, pastikan setiap array pemeriksaan terdefinisi atau gunakan array kosong jika tidak ada data
                var data = {
                    pemeriksaanAnak: {!! json_encode($data['pemeriksaanAnak'] ?? []) !!},
                    pemeriksaanIbu: {!! json_encode($data['pemeriksaanIbu'] ?? []) !!},
                    pemeriksaanLansia: {!! json_encode($data['pemeriksaanLansia'] ?? []) !!},
                    pemeriksaanRemaja: {!! json_encode($data['pemeriksaanRemaja'] ?? []) !!}
                };

                // Menggabungkan data pemeriksaan untuk semua kategori
                var tahun = [...new Set([
                    ...data.pemeriksaanAnak.map(item => item.year),
                    ...data.pemeriksaanIbu.map(item => item.year),
                    ...data.pemeriksaanLansia.map(item => item.year),
                    ...data.pemeriksaanRemaja.map(item => item.year)
                ])].sort((a, b) => a - b);

                var formattedData = tahun.map(year => {
                    return {
                        y: year,
                        a: (data.pemeriksaanAnak.find(item => item.year == year) || {
                            total: 0
                        }).total,
                        b: (data.pemeriksaanIbu.find(item => item.year == year) || {
                            total: 0
                        }).total,
                        c: (data.pemeriksaanLansia.find(item => item.year == year) || {
                            total: 0
                        }).total,
                        d: (data.pemeriksaanRemaja.find(item => item.year == year) || {
                            total: 0
                        }).total
                    };
                });

                // Jika tidak ada data, tambahkan data default agar Morris.js tidak error
                if (formattedData.length === 0) {
                    formattedData.push({
                        y: new Date().getFullYear(),
                        a: 0,
                        b: 0,
                        c: 0,
                        d: 0
                    });
                }

                // Membuat line chart dengan Morris.js
                new Morris.Line({
                    element: 'line-charts',
                    data: formattedData,
                    xkey: 'y',
                    ykeys: ['a', 'b', 'c', 'd'],
                    labels: ['Pemeriksaan Anak', 'Pemeriksaan Ibu', 'Pemeriksaan Lansia', 'Pemeriksaan Remaja'],
                    lineColors: ['#ff9b44', '#fc6075', '#008000', '#0000FF'],
                    lineWidth: '3px',
                    resize: true,
                    redraw: true,
                    parseTime: false
                });
            });
        </script>
    </x-slot:script>
</x-app-layout>
