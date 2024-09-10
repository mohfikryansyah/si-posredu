<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center ">
            <h2 class="font-medium md:text-lg text-md text-gray-700 leading-tight">
                @if (auth()->user()->tipe_entitas == 'anak')
                    Welcome, {{ auth()->user()->anak->nama }}!
                @elseif (auth()->user()->tipe_entitas == 'remaja')
                    Welcome, {{ auth()->user()->remaja->nama }}!
                @elseif (auth()->user()->tipe_entitas == 'ibu')
                    Welcome, {{ auth()->user()->ibu->nama }}!
                @elseif (auth()->user()->tipe_entitas == 'lansia')
                    Welcome, {{ auth()->user()->lansia->nama }}!
                @elseif (auth()->user()->tipe_entitas == 'petugas')
                    Welcome, {{ auth()->user()->employee->nama }}!
                @else
                    Welcome, {{ auth()->user()->name }}!
                @endif
            </h2>

            <span id="tanggalwaktu" class="text-gray-400 md:text-lg text-md"></span>
        </div>
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

    <div class="md:grid grid-cols-3">
        <div id="statistik_pemeriksaan" class="bg-white p-5">
            <h1 class="text-gray-600 text-lg font-bold mb-5">Statistik Pemeriksaan Bulan Ini</h1>
            <div class="space-y-5">
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <div
                            class="z-10 flex items-center justify-center w-5 h-5 bg-blue-200 rounded-full dark:bg-blue-900 dark:ring-gray-900 shrink-0">
                            <span class="flex w-3 h-3 bg-blue-400 rounded-full"></span>
                        </div>
                        <p class="ms-2 font-medium">Pemeriksaan Ibu</p>
                    </div>
                    <p class="font-medium">{{ $pemeriksaanBulanIni['ibu'] }}</p>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <div
                            class="z-10 flex items-center justify-center w-5 h-5 bg-green-200 rounded-full dark:bg-green-900 dark:ring-gray-900 shrink-0">
                            <span class="flex w-3 h-3 bg-green-400 rounded-full"></span>
                        </div>
                        <p class="ms-2 font-medium">Pemeriksaan Anak</p>
                    </div>
                    <p class="font-medium">{{ $pemeriksaanBulanIni['anak'] }}</p>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <div
                            class="z-10 flex items-center justify-center w-5 h-5 bg-yellow-200 rounded-full dark:bg-yellow-900 dark:ring-gray-900 shrink-0">
                            <span class="flex w-3 h-3 bg-yellow-400 rounded-full"></span>
                        </div>
                        <p class="ms-2 font-medium">Pemeriksaan Remaja</p>
                    </div>
                    <p class="font-medium">{{ $pemeriksaanBulanIni['remaja'] }}</p>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center">
                        <div
                            class="z-10 flex items-center justify-center w-5 h-5 bg-red-200 rounded-full dark:bg-red-900 dark:ring-gray-900 shrink-0">
                            <span class="flex w-3 h-3 bg-red-400 rounded-full"></span>
                        </div>
                        <p class="ms-2 font-medium">Pemeriksaan Lansia</p>
                    </div>
                    <p class="font-medium">{{ $pemeriksaanBulanIni['lansia'] }}</p>
                </div>
            </div>
        </div>
    </div>

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
            var data = @json($dataPemeriksaan);
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
