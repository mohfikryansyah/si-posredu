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
        <div class="bg-white shadow-sm rounded-lg md:mb-5 p-5 relative">
            <div id="doughnut-chart" class="w-auto h-[400px]"></div>
        </div>
        <div class="bg-white shadow-sm rounded-lg md:mb-5 p-5 relative">
            <h2 class="text-lg font-bold text-center text-gray-600">Pemeriksaan Perbulan</h2>
            <div id="share-dataset" class="w-auto h-[400px]"></div>
        </div>
    </div>

    {{-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 bg-white">
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
                        <div class="bg-blue-600 h-1.5 rounded-full progress-bar overflow-hidden"
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
    </div> --}}

    <x-slot:script>
        <script src="{{ asset('plugins/clock/clock.js') }}"></script>
        <script>
            var chartDom = document.getElementById('share-dataset');
            var myCharts = echarts.init(chartDom);
            var option;

            var months = @json($months);
            var dataIbu = @json($dataIbu);
            var dataAnak = @json($dataAnak);
            var dataRemaja = @json($dataRemaja);
            var dataLansia = @json($dataLansia);

            setTimeout(function() {
                option = {
                    legend: {
                        bottom: 'bottom',
                    },
                    tooltip: {
                        trigger: 'axis',
                        showContent: false
                    },
                    dataset: {
                        source: [
                            ['tahun', ...months],
                            ['Ibu', ...dataIbu],
                            ['Anak', ...dataAnak],
                            ['Remaja', ...dataRemaja],
                            ['Lansia', ...dataLansia]
                        ]
                    },
                    xAxis: {
                        type: 'category'
                    },
                    yAxis: {
                        gridIndex: 0
                    },
                    grid: {
                        top: '50%'
                    },
                    series: [{
                            type: 'line',
                            smooth: true,
                            seriesLayoutBy: 'row',
                            emphasis: {
                                focus: 'series'
                            }
                        },
                        {
                            type: 'line',
                            smooth: true,
                            seriesLayoutBy: 'row',
                            emphasis: {
                                focus: 'series'
                            }
                        },
                        {
                            type: 'line',
                            smooth: true,
                            seriesLayoutBy: 'row',
                            emphasis: {
                                focus: 'series'
                            }
                        },
                        {
                            type: 'line',
                            smooth: true,
                            seriesLayoutBy: 'row',
                            emphasis: {
                                focus: 'series'
                            }
                        },
                        {
                            type: 'pie',
                            id: 'pie',
                            radius: '30%',
                            center: ['50%', '25%'],
                            emphasis: {
                                focus: 'self'
                            },
                            label: {
                                formatter: '{b}: {@January} ({d}%)' // default value is January, will update later
                            },
                            encode: {
                                itemName: 'tahun',
                                value: months[0], // default value is January, will update later
                                tooltip: months[0]
                            }
                        }
                    ]
                };

                myCharts.on('updateAxisPointer', function(event) {
                    const xAxisInfo = event.axesInfo[0];
                    if (xAxisInfo) {
                        const dimension = xAxisInfo.value;
                        myCharts.setOption({
                            series: {
                                id: 'pie',
                                data: [{
                                        value: dataIbu[dimension],
                                        name: 'Ibu'
                                    },
                                    {
                                        value: dataAnak[dimension],
                                        name: 'Anak'
                                    },
                                    {
                                        value: dataRemaja[dimension],
                                        name: 'Remaja'
                                    },
                                    {
                                        value: dataLansia[dimension],
                                        name: 'Lansia'
                                    }
                                ]
                            }
                        });
                    }
                });

                myCharts.setOption(option);
            });

            option && myCharts.setOption(option);
        </script>
        <script>
            var data = @json($data);
            var chartDom = document.getElementById('doughnut-chart');
            var myChart = echarts.init(chartDom);
            var option;

            var option = {
                title: {
                    text: 'Total Pemeriksaan',
                    left: 'center'
                },
                tooltip: {
                    trigger: 'item'
                },
                legend: {
                    orient: 'vertical',
                    bottom: 'bottom',
                },
                series: [{
                    name: 'Jumlah Pemeriksaan',
                    type: 'pie',
                    radius: ['40%', '70%'], // Membuat chart menjadi doughnut
                    avoidLabelOverlap: false,
                    itemStyle: {
                        borderRadius: 10, // Membuat sudut menjadi rounded
                        borderColor: '#fff',
                        borderWidth: 2
                    },
                    label: {
                        show: false,
                        position: 'center'
                    },
                    emphasis: {
                        label: {
                            show: true,
                            fontSize: '35',
                            fontWeight: 'bold'
                        }
                    },
                    labelLine: {
                        show: false
                    },
                    data: [{
                            value: data.ibu,
                            name: 'Ibu'
                        },
                        {
                            value: data.anak,
                            name: 'Anak'
                        },
                        {
                            value: data.remaja,
                            name: 'Remaja'
                        },
                        {
                            value: data.lansia,
                            name: 'Lansia'
                        }
                    ]
                }]
            };

            // Set opsi dan render chart
            myChart.setOption(option);
        </script>
    </x-slot:script>
</x-app-layout>
