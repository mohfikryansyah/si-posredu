<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center ">
            <h2 class="font-medium md:text-lg text-md text-gray-700 leading-tight">
                @if (auth()->user()->entitas == 'anak')
                    Welcome, {{ auth()->user()->anak->nama }}!
                @elseif (auth()->user()->entitas == 'remaja')
                    Welcome, {{ auth()->user()->remaja->nama }}!
                @elseif (auth()->user()->entitas == 'ibu')
                    Welcome, {{ auth()->user()->ibu->nama }}!
                @elseif (auth()->user()->entitas == 'lansia')
                    Welcome, {{ auth()->user()->lansia->nama }}!
                @elseif (auth()->user()->entitas == 'petugas')
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

    <div class="md:grid grid-cols-3 md:mt-0 mt-5 gap-5 rounded-lg">
        <div id="statistik_pemeriksaan" class="bg-white p-5 col-span-1 max-h-[250px]">
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
        <div id="statistik_pemeriksaan" class="bg-white p-5 col-span-2 rounded-lg">
            <div class="h-auto rounded-lg">
                <div
                    class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 bg-transparent dark:bg-gray-900 rounded-t-lg">
                    <!-- Button to open modal -->
                    <button x-data x-on:click.prevent="$dispatch('open-modal', 'export_pemeriksaan_remaja')"
                        class="openbtn bg-green-400 text-white inline-flex items-center px-4 py-1.5 rounded-lg font-medium">
                        Export Excel
                    </button>
                </div>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white mt-4">
                <table id="table_pemeriksaan_ibu">
                    <thead>
                        <tr>
                            <th scope="col" class="whitespace-normal">Nama</th>
                            <th scope="col" class="whitespace-normal">Tgl. Pemeriksaan yang terlewat</th>
                            <th scope="col" class="whitespace-normal">Judul Pemeriksaan</th>
                            <th scope="col" class="whitespace-normal">Entitas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tanpaPemeriksaan as $tp)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th class="whitespace-nowrap">
                                    {{ $tp->nama }}
                                </th>
                                <td class="whitespace-nowrap md:whitespace-normal">
                                    {{ date_format(date_create($tp->tanggal_pelayanan), 'd F, Y') }}
                                </td>
                                <td class="whitespace-nowrap md:whitespace-normal">
                                    {{ $tp->judul_pelayanan }}
                                </td>
                                <td class="whitespace-nowrap md:whitespace-normal">
                                    {{ $tp->entitas_type }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal Component -->
    <x-modal name="export_pemeriksaan_remaja" id="export_pemeriksaan_remaja" :show="false" maxWidth="2xl" focusable>
        <div class="p-6">
            <h2 class="text-lg font-medium text-gray-900">Export Entitas Tanpa Pemeriksaan</h2>
            <form action="{{ route('dashboard.export') }}" method="GET" class="mt-4">
                @csrf
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="entitas"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Pilih Entitas<span class="text-red-500">*</span>
                            </label>
                            <select id="entitas" name="entitas"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                style="width: 100%;">
                                <option value="" {{ old('entitas') == '' ? 'selected' : '' }}>Semua
                                </option>
                                <option value="Anak" {{ old('entitas') == 'Anak' ? 'selected' : '' }}>Anak
                                </option>
                                <option value="Remaja" {{ old('entitas') == 'Remaja' ? 'selected' : '' }}>Remaja
                                </option>
                                <option value="Ibu" {{ old('entitas') == 'Ibu' ? 'selected' : '' }}>Ibu
                                </option>
                                <option value="Lansia" {{ old('entitas') == 'Lansia' ? 'selected' : '' }}>Lansia
                                </option>
                            </select>
                    </div>

                    <div id="entity_details" class="col-span-2">
                        <!-- Fields for different entities will be added here dynamically -->
                    </div>

                    {{-- <div class="col-span-2">
                        <label for="nama"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama<span
                                class="text-red-500">*</span></label>
                        <select id="export_nama" name="nama"
                            class="select2nama bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            style="width: 100%;">
                            <option value="" selected>Semua</option>
                            @foreach ($tanpaPemeriksaan as $tp)
                                @if (old('nama') === $tp->id)
                                    <option value="{{ $tp->id }}" selected>{{ $tp->nama }}
                                    </option>
                                @else
                                    <option value="{{ $tp->id }}">{{ $tp->nama }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('nama', 'export_pemeriksaan_remaja')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div> --}}
                    <div class="md:col-span-1 col-span-2">
                        <label for="start"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mulai tanggal<span
                                class="text-red-500">*</span></label>
                        <x-date-input name="start" id="start"
                            class="{{ $errors->export_pemeriksaan_remaja->has('start') ? 'border-red-500' : 'border-gray-300' }}"
                            value="{{ old('start') }}"></x-date-input>
                        @error('start', 'export_pemeriksaan_remaja')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="md:col-span-1 col-span-2">
                        <label for="end"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sampai tanggal<span
                                class="text-red-500">*</span></label>
                        <x-date-input name="end" id="end"
                            class="{{ $errors->export_pemeriksaan_remaja->has('end') ? 'border-red-500' : 'border-gray-300' }}"
                            value="{{ old('end') }}"></x-date-input>
                        @error('end', 'export_pemeriksaan_remaja')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Batal') }}
                    </x-secondary-button>

                    <x-save-button x-on:click="$dispatch('close')" class="ms-3">
                        {{ __('Export') }}
                    </x-save-button>
                </div>
            </form>
        </div>
    </x-modal>


    <x-slot:script>
        <script src="{{ asset('plugins/clock/clock.js') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Get the old entity type
                var oldEntityType = "{{ old('entitas') }}";
                if (oldEntityType) {
                    document.getElementById('entitas').value = oldEntityType;
                    generateFields(oldEntityType); // Generate fields if there was an old value
                }

                document.getElementById('entitas').addEventListener('change', function() {
                    var entityType = this.value;
                    generateFields(entityType);
                });

                function generateFields(entityType) {
                    var detailsDiv = document.getElementById('entity_details');
                    detailsDiv.innerHTML = ''; // Clear previous fields

                    if (entityType === 'Anak') {
                        detailsDiv.innerHTML = `
                            <div class="col-span-2">
                                <label for="id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama<span class="text-red-500">*</span></label>
                                <select id="id" name="id"
                            class="select2nama bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            style="width: 100%;">
                            <option value="" selected>Semua</option>
                            @foreach ($tanpaPemeriksaan as $tp)
                                @if ($tp->entitas_type == 'Anak')
                                    <option value="{{ $tp->id }}" {{ old('id') == $tp->id ? 'selected' : '' }}>{{ $tp->nama }}</option>
                                @endif
                            @endforeach
                                </select>
                            </div>
                        `;
                    } else if (entityType === 'Remaja') {
                        detailsDiv.innerHTML = `
                            <div class="col-span-2">
                                <label for="id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama<span class="text-red-500">*</span></label>
                                <select id="id" name="id"
                            class="select2nama bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            style="width: 100%;">
                            <option value="" selected>Semua</option>
                            @foreach ($tanpaPemeriksaan as $tp)
                                @if ($tp->entitas_type == 'Remaja')
                                    <option value="{{ $tp->id }}" {{ old('id') == $tp->id ? 'selected' : '' }}>{{ $tp->nama }}</option>
                                @endif
                            @endforeach
                                </select>
                            </div>
                        `;
                    } else if (entityType === 'Lansia') {
                        detailsDiv.innerHTML = `
                            <div class="col-span-2">
                                <label for="id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama<span class="text-red-500">*</span></label>
                                <select id="id" name="id"
                            class="select2nama bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            style="width: 100%;">
                            <option value="" selected>Semua</option>
                            @foreach ($tanpaPemeriksaan as $tp)
                                @if ($tp->entitas_type == 'Lansia')
                                    <option value="{{ $tp->id }}" {{ old('id') == $tp->id ? 'selected' : '' }}>{{ $tp->nama }}</option>
                                @endif
                            @endforeach
                                </select>
                            </div>
                        `;
                    } else if (entityType === 'Ibu') {
                        detailsDiv.innerHTML = `
                            <div class="col-span-2">
                                <label for="id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama<span class="text-red-500">*</span></label>
                                <select id="id" name="id"
                            class="select2nama bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            style="width: 100%;">
                            <option value="" selected>Semua</option>
                            @foreach ($tanpaPemeriksaan as $tp)
                                @if ($tp->entitas_type == 'Ibu')
                                    <option value="{{ $tp->id }}" {{ old('id') == $tp->id ? 'selected' : '' }}>{{ $tp->nama }}</option>
                                @endif
                            @endforeach
                                </select>
                            </div>
                        `;
                    } 
                    // Reinitialize select2 after fields are added dynamically
                    $('.select2nama').select2();
                }
            });
        </script>
        <script>
            $(document).ready(function() {
                $(".select2nama").select2({
                    width: 'resolve' // need to override the changed default
                });
            });
        </script>
        <script>
            new DataTable('#table_pemeriksaan_ibu', {
                order: []
            });
        </script>
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
