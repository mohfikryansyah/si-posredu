<x-app-layout>

    {{-- <div class="h-screen"> --}}
    <div class="grid lg:grid-cols-12 gap-5">
        <div class="relative lg:col-span-3 col-span-12 rounded-lg p-5 bg-white shadow-md">
            <div class="flex text-[180px] justify-center pb-3">
                @if ($mom->ibu->user)
                    @if ($mom->ibu->user->fotoProfile)
                        <img src="{{ asset('storage/' . $mom->ibu->user->fotoProfile) }}"
                            class="w-48 h-48 rounded-full object-cover" alt="user foto">
                    @endif
                @else
                    <i class="fa-solid fa-circle-user"></i>
                @endif
            </div>
            <div class="mt-3 space-y-3">
                <div class="inline-flex items-center justify-center w-full">
                    <hr class="w-full h-px bg-gray-200 border-0 dark:bg-gray-700">
                    <span
                        class="absolute px-3 font-medium text-gray-800 -translate-x-1/2 bg-white left-1/2 dark:text-white dark:bg-gray-900">Data
                        Diri</span>
                </div>
                <div class="space-y-1">
                    <p class="text-gray-500 text-sm">Nama</p>
                    <p class="text-gray-800 font-medium text-sm">
                        {{ $mom->ibu->nama }}
                    </p>
                </div>
                <div class="space-y-1">
                    <p class="text-gray-500 text-sm">Lahir</p>
                    <p class="text-gray-800 font-medium text-sm">
                        {{ $mom->ibu->tempat_tanggal_lahir }}
                    </p>
                </div>
                <div class="space-y-1">
                    <p class="text-gray-500 text-sm">Alamat</p>
                    <p class="text-gray-800 font-medium text-sm">
                        {{ $mom->ibu->alamat }}
                    </p>
                </div>
                <div class="space-y-1">
                    <p class="text-gray-500 text-sm">Pekerjaan</p>
                    <p class="text-gray-800 font-medium text-sm">
                        {{ $mom->ibu->pekerjaan }}
                    </p>
                </div>
            </div>
        </div>


        <div class="lg:col-span-6 col-span-12 bg-white rounded-lg shadow-md">
            <div class="p-5">
                <p class="text-orange-600 font-bold text-xl">Detail Pemeriksaan ({{ $mom->pemeriksaan_ke }})</p>
            </div>
            <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700">
            <div class="px-5 py-3">
                <div class="md:grid-cols-3 grid-cols-2 mt-2 gap-y-3 hidden md:grid">
                    <p class="col-start-2 text-orange-400 font-bold">Saat Ini</p>
                    <p class="text-orange-400 font-bold">Sebelumnya</p>
                </div>
                <div class="grid md:grid-cols-3 grid-cols-2 mt-3 gap-y-3">
                    <div class="space-y-3">
                        <p class="text-gray-500 text-sm truncate">Tanggal Pemeriksaan</p>
                        <p class="text-gray-500 text-sm truncate">Petugas Pemeriksa</p>
                        <p class="text-gray-500 text-sm truncate">Usia Kehamilan</p>
                        <p class="text-gray-500 text-sm truncate">Tekanan Darah</p>
                        <p class="text-gray-500 text-sm truncate">Berat Badan</p>
                        <p class="text-gray-500 text-sm truncate">Tinggi Badan</p>
                        <p class="text-gray-500 text-sm truncate">Lingkar Lengan Atas</p>

                        <p class="text-gray-500 text-sm truncate">Pemeriksaan Lab</p>
                        <p class="text-gray-500 text-sm truncate">Suntik Tetanus Toksoid</p>
                        <p class="text-gray-500 text-sm truncate">Tinggi Fundus</p>
                        <p class="text-gray-500 text-sm truncate">Denyut Jantung Janin</p>
                        <p class="text-gray-500 text-sm truncate">Keluhan</p>
                        <p class="text-gray-500 text-sm truncate">Pemberian Vitamin</p>
                    </div>
                    <div class="space-y-3">
                        <p class="text-gray-800 font-medium text-sm truncate">
                            {{ date_format(date_create($mom->tanggal_pemeriksaan), 'd F, Y') }}
                        </p>
                        <p class="text-gray-800 font-medium text-sm truncate">
                            {{ $mom->employee->nama }}
                        </p>
                        <p class="text-gray-800 font-medium text-sm truncate">
                            {{ $mom->usia_kehamilan }}
                            <span class="text-gray-500">Minggu</span>
                        </p>
                        <p class="text-gray-800 font-medium text-sm truncate">
                            {{ $mom->tekanan_darah }}
                            <span class="text-gray-500">mmHg</span>
                        </p>
                        <p class="text-gray-800 font-medium text-sm truncate">
                            {{ $mom->berat_badan }}
                            <span class="text-gray-500">kg</span>
                        </p>
                        <p class="text-gray-800 font-medium text-sm truncate">
                            {{ $mom->tinggi_badan }}
                            <span class="text-gray-500">cm</span>
                        </p>
                        <p class="text-gray-800 font-medium text-sm truncate">
                            {{ $mom->lingkar_lengan_atas }}
                            <span class="text-gray-500">cm</span>
                        </p>
                        <p class="text-gray-800 font-medium text-sm truncate">
                            {{ $mom->pemeriksaan_lab }}
                        </p>
                        <p class="text-gray-800 font-medium text-sm truncate">
                            {{ $mom->suntik_tetanus_toksoid }}
                        </p>
                        <p class="text-gray-800 font-medium text-sm truncate">
                            {{ $mom->tinggi_fundus }}
                            <span class="text-gray-500">cm</span>
                        </p>
                        <p class="text-gray-800 font-medium text-sm truncate">
                            {{ $mom->denyut_jantung_janin }}
                            <span class="text-gray-500">bpm</span>
                        </p>
                        <p class="text-gray-800 font-medium text-sm truncate">
                            {{ $mom->keluhan }}
                        </p>
                        <p class="text-gray-800 font-medium text-sm truncate">
                            {{ $mom->pemberian_vitamin }}
                        </p>
                    </div>

                    @if ($pemeriksaanSebelumnya)
                        <div class="space-y-3 hidden md:block">
                            <p class="text-gray-800 font-medium text-sm">
                                {{ date_format(date_create($pemeriksaanSebelumnya->tanggal_pemeriksaan), 'd F, Y') }}
                            </p>
                            <p class="text-gray-800 font-medium text-sm">
                                {{ $pemeriksaanSebelumnya->employee->nama }}
                            </p>
                            <p class="text-gray-800 font-medium text-sm">
                                {{ $pemeriksaanSebelumnya->usia_kehamilan }}
                                <span class="text-gray-500">Minggu</span>
                            </p>
                            <p class="text-gray-800 font-medium text-sm">
                                {{ $pemeriksaanSebelumnya->tekanan_darah }}
                                <span class="text-gray-500">mmHg</span>
                            </p>
                            <p class="text-gray-800 font-medium text-sm">
                                {{ $pemeriksaanSebelumnya->berat_badan }}
                                <span class="text-gray-500">kg</span>
                            </p>
                            <p class="text-gray-800 font-medium text-sm">
                                {{ $pemeriksaanSebelumnya->tinggi_badan }}
                                <span class="text-gray-500">cm</span>
                            </p>
                            <p class="text-gray-800 font-medium text-sm">
                                {{ $pemeriksaanSebelumnya->lingkar_lengan_atas }}
                                <span class="text-gray-500">cm</span>
                            </p>
                            <p class="text-gray-800 font-medium text-sm">
                                {{ $pemeriksaanSebelumnya->pemeriksaan_lab }}
                            </p>
                            <p class="text-gray-800 font-medium text-sm">
                                {{ $pemeriksaanSebelumnya->suntik_tetanus_toksoid }}
                            </p>
                            <p class="text-gray-800 font-medium text-sm">
                                {{ $pemeriksaanSebelumnya->tinggi_fundus }}
                                <span class="text-gray-500">cm</span>
                            </p>
                            <p class="text-gray-800 font-medium text-sm">
                                {{ $pemeriksaanSebelumnya->denyut_jantung_janin }}
                                <span class="text-gray-500">bpm</span>
                            </p>
                            <p class="text-gray-800 font-medium text-sm">
                                {{ $pemeriksaanSebelumnya->keluhan }}
                            </p>
                            <p class="text-gray-800 font-medium text-sm">
                                {{ $pemeriksaanSebelumnya->pemberian_vitamin }}
                            </p>
                        </div>
                    @else
                        <div
                            class="col-span-1 hidden md:flex col-start-3 row-span-full items-center justify-center text-gray-400">
                            <p>Tidak ada data sebelumnya</p>
                        </div>
                    @endif
                </div>
            </div>

        </div>


        <div class="lg:col-span-3 col-span-12 rounded-lg bg-white shadow-md">
            <div class="border-b p-3 lg:text-2xl font-medium text-center text-orange-400 text-lg">
                <p class="text-orange-600 font-bold text-xl">Darah</p>
            </div>
            <div class="flex justify-center border-b pb-2">
                <img class="w-40 h-40 duration-300 animate-heartbeat" src="{{ asset('images/heartbeat.png') }}"
                    alt="">
            </div>
            <div class="px-3 py-2 text-orange-400 relative">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <tbody>
                        <tr>
                            <td class="py-1 text-orange-500">
                                Saat Ini
                            </td>
                        </tr>
                        <tr>
                            <td class="py-1 text-gray-500">
                                Tekanan Darah Ibu
                            </td>
                            <th scope="row" class="text-right text-gray-800 font-medium dark:text-white">
                                {{ $mom->tekanan_darah . ' mmHg' }}
                            </th>
                        </tr>
                        <tr>
                            <td class="py-1 text-gray-500">
                                Denyut Jantung Janin
                            </td>
                            <th scope="row" class="text-right text-gray-800 font-medium dark:text-white">
                                {{ $mom->denyut_jantung_janin . ' bpm' }}
                            </th>
                        </tr>
                        <tr>
                            <td class="py-1 text-gray-500">
                                Gol. Darah
                            </td>
                            <th scope="row" class="text-right text-gray-800 font-medium dark:text-white">
                                {{ $mom->ibu->golongan_darah }}
                            </th>
                        </tr>
                        @if ($pemeriksaanSebelumnya)
                            <tr>
                                <td class="py-1 text-orange-500">
                                    Sebelumnya
                                </td>
                            </tr>
                            <tr>
                                <td class="py-1 text-gray-500">
                                    Tekanan Darah Ibu
                                </td>
                                <th scope="row" class="text-right text-gray-800 font-medium dark:text-white">
                                    {{ $pemeriksaanSebelumnya->tekanan_darah . ' mmHg' }}
                                </th>
                            </tr>
                            <tr>
                                <td class="py-1 text-gray-500">
                                    Denyut Jantung Janin
                                </td>
                                <th scope="row" class="text-right text-gray-800 font-medium dark:text-white">
                                    {{ $pemeriksaanSebelumnya->denyut_jantung_janin . ' bpm' }}
                                </th>
                            </tr>
                            <tr>
                                <td class="py-1 text-gray-500">
                                    Gol. Darah
                                </td>
                                <th scope="row" class="text-right text-gray-800 font-medium dark:text-white">
                                    {{ $pemeriksaanSebelumnya->ibu->golongan_darah }}
                                </th>
                            </tr>
                        @endif
                        <tr>
                            <td colspan="2">
                                <div class="inline-flex items-center justify-center w-full">
                                    <hr class="w-full h-px bg-gray-200 border-0 dark:bg-gray-700">
                                    <span
                                        class="absolute px-3 font-medium -translate-x-1/2 bg-white left-1/2 dark:text-white dark:bg-gray-900">Catatan Saat Ini</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="pt-2" colspan="2">
                                {{ Str::limit($mom->catatan, 69, '...') }}
                            </td>
                        </tr>
                        @if ($pemeriksaanSebelumnya)
                        <tr>
                            <td colspan="2">
                                <div class="inline-flex items-center justify-center w-full">
                                    <hr class="w-full h-px bg-gray-200 border-0 dark:bg-gray-700">
                                    <span
                                        class="absolute px-3 font-medium -translate-x-1/2 bg-white left-1/2 dark:text-white dark:bg-gray-900">Catatan Sebelumnya</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="pt-2" colspan="2">
                                {{ Str::limit($mom->catatan, 69, '...') }}
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        @if ($pemeriksaanSebelumnya)
            <div class="lg:col-span-6 col-span-12 bg-white rounded-lg shadow-md block md:hidden">
                <div class="p-5">
                    <p class="text-orange-600 font-bold text-xl">Detail Pemeriksaan Sebelumnya</p>
                </div>
                <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700">
                <div class="px-5 py-3">
                    <div class="grid grid-cols-2 mt-2 gap-y-3">
                        <div class="space-y-3">
                            <p class="text-gray-500 text-sm truncate">Tanggal Pemeriksaan</p>
                            <p class="text-gray-500 text-sm truncate">Petugas Pemeriksa</p>
                            <p class="text-gray-500 text-sm truncate">Usia Kehamilan</p>
                            <p class="text-gray-500 text-sm truncate">Tekanan Darah</p>
                            <p class="text-gray-500 text-sm truncate">Berat Badan</p>
                            <p class="text-gray-500 text-sm truncate">Tinggi Badan</p>
                            <p class="text-gray-500 text-sm truncate">Lingkar Lengan Atas</p>

                            <p class="text-gray-500 text-sm truncate">Pemeriksaan Lab</p>
                            <p class="text-gray-500 text-sm truncate">Suntik Tetanus Toksoid</p>
                            <p class="text-gray-500 text-sm truncate">Tinggi Fundus</p>
                            <p class="text-gray-500 text-sm truncate">Denyut Jantung Janin</p>
                            <p class="text-gray-500 text-sm truncate">Keluhan</p>
                            <p class="text-gray-500 text-sm truncate">Pemberian Vitamin</p>
                        </div>

                        <div class="space-y-3 block md:hidden">
                            <p class="text-gray-800 font-medium text-sm truncate">
                                {{ date_format(date_create($pemeriksaanSebelumnya->tanggal_pemeriksaan), 'd F, Y') }}
                            </p>
                            <p class="text-gray-800 font-medium text-sm truncate">
                                {{ $pemeriksaanSebelumnya->employee->nama }}
                            </p>
                            <p class="text-gray-800 font-medium text-sm truncate">
                                {{ $pemeriksaanSebelumnya->usia_kehamilan }}
                                <span class="text-gray-500">Minggu</span>
                            </p>
                            <p class="text-gray-800 font-medium text-sm truncate">
                                {{ $pemeriksaanSebelumnya->tekanan_darah }}
                                <span class="text-gray-500">mmHg</span>
                            </p>
                            <p class="text-gray-800 font-medium text-sm truncate">
                                {{ $pemeriksaanSebelumnya->berat_badan }}
                                <span class="text-gray-500">kg</span>
                            </p>
                            <p class="text-gray-800 font-medium text-sm truncate">
                                {{ $pemeriksaanSebelumnya->tinggi_badan }}
                                <span class="text-gray-500">cm</span>
                            </p>
                            <p class="text-gray-800 font-medium text-sm truncate">
                                {{ $pemeriksaanSebelumnya->lingkar_lengan_atas }}
                                <span class="text-gray-500">cm</span>
                            </p>
                            <p class="text-gray-800 font-medium text-sm truncate">
                                {{ $pemeriksaanSebelumnya->pemeriksaan_lab }}
                            </p>
                            <p class="text-gray-800 font-medium text-sm truncate">
                                {{ $pemeriksaanSebelumnya->suntik_tetanus_toksoid }}
                            </p>
                            <p class="text-gray-800 font-medium text-sm truncate">
                                {{ $pemeriksaanSebelumnya->tinggi_fundus }}
                                <span class="text-gray-500">cm</span>
                            </p>
                            <p class="text-gray-800 font-medium text-sm truncate">
                                {{ $pemeriksaanSebelumnya->denyut_jantung_janin }}
                                <span class="text-gray-500">bpm</span>
                            </p>
                            <p class="text-gray-800 font-medium text-sm truncate">
                                {{ $pemeriksaanSebelumnya->keluhan }}
                            </p>
                            <p class="text-gray-800 font-medium text-sm truncate">
                                {{ $pemeriksaanSebelumnya->pemberian_vitamin }}
                            </p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="lg:col-span-3 col-span-12 rounded-lg bg-white shadow-md block md:hidden">
                <div class="border-b p-3 lg:text-2xl font-medium text-center text-orange-400 text-lg">
                    <p class="text-orange-600 font-bold text-xl">Darah</p>
                </div>
                <div class="flex justify-center border-b pb-2">
                    <img class="w-40 h-40 duration-300 animate-heartbeat" src="{{ asset('images/heartbeat.png') }}"
                        alt="">
                </div>
                <div class="px-3 py-2 text-orange-400 relative">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <tbody>
                            <tr>
                                <td class="py-1 text-orange-400">
                                    Tekanan Darah Ibu
                                </td>
                                <th scope="row" class="text-right font-medium dark:text-white">
                                    {{ $pemeriksaanSebelumnya->tekanan_darah . ' mmHg' }}
                                </th>
                            </tr>
                            <tr>
                                <td class="py-1 text-orange-400">
                                    Denyut Jantung Janin
                                </td>
                                <th scope="row" class="text-right font-medium dark:text-white">
                                    {{ $pemeriksaanSebelumnya->denyut_jantung_janin . ' bpm' }}
                                </th>
                            </tr>
                            <tr>
                                <td class="py-1 text-orange-400">
                                    Gol. Darah
                                </td>
                                <th scope="row" class="text-right font-medium dark:text-white">
                                    {{ $pemeriksaanSebelumnya->ibu->golongan_darah }}
                                </th>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="inline-flex items-center justify-center w-full">
                                        <hr class="w-full h-px bg-gray-200 border-0 dark:bg-gray-700">
                                        <span
                                            class="absolute px-3 font-medium -translate-x-1/2 bg-white left-1/2 dark:text-white dark:bg-gray-900">Catatan</span>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="pt-2" colspan="2">
                                    {{ Str::limit($pemeriksaanSebelumnya->catatan, 69, '...') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
