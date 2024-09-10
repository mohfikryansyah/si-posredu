<x-app-layout>
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
        <script src="{{ asset('plugins/jquery/dataTables.js') }}"></script>
        <script src="{{ asset('plugins/jquery/dataTables.tailwindcss.js') }}"></script>
        @stack('tabel_anak')
        @stack('tabel_ibu')
        @stack('tabel_lansia')
        @stack('tabel_remaja')
    </x-slot:script>

</x-app-layout>
