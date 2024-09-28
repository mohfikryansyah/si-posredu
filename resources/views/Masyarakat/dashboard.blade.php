<x-app-layout>
    @if ($jadwal && Carbon\Carbon::now()->lt($jadwal->tanggal_pelayanan))
        <x-slot name="info">
            <div id="alert-1"
                class="flex items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    Terdapat pelayanan {{ $jadwal->nama }} yang akan dilaksanakan pada {{ date_format(date_create($jadwal->tanggal_pelayanan), 'd F, Y') }} mulai dari pukul {{ $jadwal->start }} s.d {{ $jadwal->end }}. 
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-1" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        </x-slot>
    @endif

    <x-slot name="header">
        <h2 class="font-semibold md:text-xl text-lg text-gray-800 leading-tight">
            {{ __('Data Pemeriksaan Anda') }}
        </h2>
    </x-slot>

    <div class="flex space-x-2">
        <div class="h-auto rounded-lg py-5">
            <div
                class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 bg-transparent dark:bg-gray-900 rounded-t-lg">
                <!-- Button to open modal -->
                <button x-data
                    x-on:click.prevent="$dispatch('open-modal', 'export_pemeriksaan_{{ Auth::user()->tipe_entitas }}')"
                    class="openbtn bg-green-400 text-white inline-flex items-center px-4 py-1.5 rounded-lg font-medium">
                    Export Excel
                </button>
            </div>
        </div>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white">
        @if (Auth::user()->tipe_entitas == 'anak')
            @include('Masyarakat.Anak.tabel-anak')
        @elseif (Auth::user()->tipe_entitas == 'ibu')
            @include('Masyarakat.Ibu.tabel-ibu')
        @elseif (Auth::user()->tipe_entitas == 'lansia')
            @include('Masyarakat.Lansia.tabel-lansia')
        @elseif (Auth::user()->tipe_entitas == 'remaja')
            @include('Masyarakat.Remaja.tabel-remaja')
        @endif
    </div>

    @if (Auth::user()->tipe_entitas == 'anak')
        @include('Masyarakat.Anak.export')
    @elseif (Auth::user()->tipe_entitas == 'ibu')
        @include('Masyarakat.Ibu.export')
    @elseif (Auth::user()->tipe_entitas == 'lansia')
        @include('Masyarakat.Lansia.export')
    @elseif (Auth::user()->tipe_entitas == 'remaja')
        @include('Masyarakat.Remaja.export')
    @endif


    <x-slot:script>

        @stack('tabel_anak')
        @stack('tabel_ibu')
        @stack('tabel_lansia')
        @stack('tabel_remaja')
    </x-slot:script>

</x-app-layout>
