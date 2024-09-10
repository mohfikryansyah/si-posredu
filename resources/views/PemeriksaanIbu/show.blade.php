<x-app-layout>

    {{-- <div class="h-screen"> --}}
    <div class="grid lg:grid-cols-12 gap-5">
        <div class="relative lg:col-span-3 col-span-12 rounded-lg p-5 bg-gray-50 shadow-md">
            <div class="flex text-[180px] justify-center pb-3">
                @if ($mom->ibu->user->fotoProfile)
                    <img src="{{ asset('storage/' . $mom->ibu->user->fotoProfile) }}"
                        class="w-48 h-48 rounded-full object-cover" alt="user foto">
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
                <p class="text-orange-600 font-bold text-xl">Detail Pemeriksaan</p>
            </div>
            <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700">
            <div class="px-5 py-3">
                <div class="grid grid-cols-2 mt-2 gap-y-3">
                    <p class="text-gray-500 text-sm">Tanggal Pemeriksaan</p>
                    <p class="text-gray-800 font-medium text-sm">
                        {{ $mom->tanggal_pemeriksaan }}
                    </p>

                    <p class="text-gray-500 text-sm">Petugas Pemeriksa</p>
                    <p class="text-gray-800 font-medium text-sm">
                        {{ $mom->employee->nama }}
                    </p>

                    <p class="text-gray-500 text-sm">Usia Kehamilan</p>
                    <p class="text-gray-800 font-medium text-sm">
                        {{ $mom->usia_kehamilan }}
                        <span class="text-gray-500">Minggu</span>
                    </p>

                    <p class="text-gray-500 text-sm">Tekanan Darah</p>
                    <p class="text-gray-800 font-medium text-sm">
                        {{ $mom->tekanan_darah }}
                        <span class="text-gray-500">mmHg</span>
                    </p>

                    <p class="text-gray-500 text-sm">Berat Badan</p>
                    <p class="text-gray-800 font-medium text-sm">
                        {{ $mom->berat_badan }}
                        <span class="text-gray-500">kg</span>
                    </p>

                    <p class="text-gray-500 text-sm">Tinggi Badan</p>
                    <p class="text-gray-800 font-medium text-sm">
                        {{ $mom->tinggi_badan }}
                        <span class="text-gray-500">cm</span>
                    </p>

                    <p class="text-gray-500 text-sm">Lingkar Lengan Atas</p>
                    <p class="text-gray-800 font-medium text-sm">
                        {{ $mom->lingkar_lengan_atas }}
                        <span class="text-gray-500">cm</span>
                    </p>

                    <p class="text-gray-500 text-sm">Pemeriksaan Lab</p>
                    <p class="text-gray-800 font-medium text-sm">
                        {{ $mom->pemeriksaan_lab }}
                    </p>

                    <p class="text-gray-500 text-sm">Suntik Tetanus Toksoid</p>
                    <p class="text-gray-800 font-medium text-sm">
                        {{ $mom->suntik_tetanus_toksoid }}
                    </p>

                    <p class="text-gray-500 text-sm">Tinggi Fundus</p>
                    <p class="text-gray-800 font-medium text-sm">
                        {{ $mom->tinggi_fundus }}
                        <span class="text-gray-500">cm</span>
                    </p>

                    <p class="text-gray-500 text-sm">Denyut Jantung Janin</p>
                    <p class="text-gray-800 font-medium text-sm">
                        {{ $mom->denyut_jantung_janin }}
                        <span class="text-gray-500">bpm</span>
                    </p>

                    <p class="text-gray-500 text-sm">Keluhan</p>
                    <p class="text-gray-800 font-medium text-sm">
                        {{ $mom->keluhan }}
                    </p>

                    <p class="text-gray-500 text-sm">Pemberian Vitamin</p>
                    <p class="text-gray-800 font-medium text-sm">
                        {{ $mom->pemberian_vitamin }}
                    </p>

                    <p class="text-gray-500 text-sm">Catatan</p>
                    <p class="text-gray-800 font-medium text-sm">
                        {{ $mom->catatan }}
                    </p>
                </div>
            </div>

        </div>


        <div class="lg:col-span-3 col-span-12 rounded-lg bg-gray-50 shadow-md">
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
                                {{ $mom->tekanan_darah . ' mmHg' }}
                            </th>
                        </tr>
                        <tr>
                            <td class="py-1 text-orange-400">
                                Denyut Jantung Janin
                            </td>
                            <th scope="row" class="text-right font-medium dark:text-white">
                                {{ $mom->denyut_jantung_janin . ' bpm' }}
                            </th>
                        </tr>
                        <tr>
                            <td class="py-1 text-orange-400">
                                Gol. Darah
                            </td>
                            <th scope="row" class="text-right font-medium dark:text-white">
                                {{ $mom->ibu->golongan_darah }}
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
                                {{ Str::limit($mom->catatan, 69, '...') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
