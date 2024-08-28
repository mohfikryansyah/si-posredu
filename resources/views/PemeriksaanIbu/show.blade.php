<x-app-layout>

    {{-- <div class="h-screen"> --}}
    <div class="grid lg:grid-cols-12 gap-5">
        <div class="lg:col-span-3 col-span-12 rounded-lg p-5 bg-gray-50 shadow-lg">
            <div class="flex justify-center border-b pb-6">
                <img class="w-48 h-48 rounded-full hover:scale-105 duration-300"
                    src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
            </div>

            <div class="relative overflow-x-hidden">
                <table class="w-full mt-1 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <tbody>
                        <tr>
                            <td class="py-1 text-orange-400">
                                Petugas
                            </td>
                            <th scope="row" class="text-right font-medium whitespace-nowrap dark:text-white">
                                {{ Str::limit($mom->employee->name, 17, '...') }}
                            </th>
                        </tr>
                        <tr>
                            <td class="py-1 text-orange-400">
                                Tanggal Periksa
                            </td>
                            <th scope="row" class="text-right font-medium dark:text-white">
                                {{ date_format(date_create($mom->tanggal_pemeriksaan), 'd M, Y') }}
                            </th>
                        </tr>
                        <tr>
                            <td class="py-1 text-orange-400">
                                Vitamin
                            </td>
                            <th scope="row" class="text-right font-medium dark:text-white">
                                {{ $mom->pemberian_vitamin }}
                            </th>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="inline-flex items-center justify-center w-full">
                                    <hr class="w-full h-px bg-gray-200 border-0 dark:bg-gray-700">
                                    <span
                                        class="absolute px-3 font-medium -translate-x-1/2 bg-white left-1/2 dark:text-white dark:bg-gray-900">Keluhan</span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="pt-2" colspan="2">
                                {{ Str::limit($mom->keluhan, 69, '...') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="lg:col-span-6 col-span-12">
            <div class="grid grid-cols-2 gap-5 h-[54vh]">
                <div class="col-span-2 rounded-lg px-5 pt-5 bg-gray-50 shadow-lg">
                    <h1 class="lg:text-2xl text-lg lg:text-left text-center font-medium text-orange-400">
                        {{ $mom->ibu->nama }}</h1>
                    <h1 class="lg:text-lg text-md lg:text-left text-center text-gray-400">Istri dari
                        {{ $mom->ibu->nama_suami }}
                    </h1>
                </div>
                <div class="col-span-1 rounded-lg bg-gray-50 shadow-lg">
                    <div class="grid row-span-3 h-full">
                        <div class="py-3 px-5 border-b">
                            <h1 class="font-medium text-md text-orange-400">Lahir</h1>
                            <h1 class="font-medium text-lg text-gray-500 mt-2">{{ $mom->ibu->tempat_tanggal_lahir }}
                            </h1>
                        </div>
                        <div class="py-3 px-5 border-b">
                            <h1 class="font-medium text-md text-orange-400">Alamat</h1>
                            <h1 class="font-medium text-lg text-gray-500 mt-2">{{ $mom->ibu->alamat }}</h1>
                        </div>
                        <div class="py-3 px-5 border-b">
                            <h1 class="font-medium text-md text-orange-400">No. Tlp</h1>
                            <h1 class="font-medium text-lg text-gray-500 mt-2">{{ $mom->ibu->no_tlp }}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-span-1 rounded-lg bg-gray-50 shadow-lg">
                    <div class="grid row-span-3 h-full">
                        <div class="py-3 px-5 border-b">
                            <h1 class="font-medium text-md text-orange-400">Usia Kehamilan</h1>
                            <h1 class="font-medium text-lg text-gray-500 mt-2">{{ $mom->usia_kehamilan }}</h1>
                        </div>
                        <div class="py-3 px-5 border-b">
                            <h1 class="font-medium text-md text-orange-400">Kehamilan Ke</h1>
                            <h1 class="font-medium text-lg text-gray-500 mt-2">{{ $mom->ibu->nomor_kehamilan }}</h1>
                        </div>
                        <div class="py-3 px-5 border-b">
                            <h1 class="font-medium text-md text-orange-400">Tinggi Fundus</h1>
                            <h1 class="font-medium text-lg text-gray-500 mt-2">{{ $mom->tinggi_fundus . ' cm' }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:col-span-3 col-span-12 rounded-lg bg-gray-50 shadow-lg">
            <div class="border-b p-3 lg:text-2xl font-medium text-center text-orange-400 text-lg">
                <p>Tekanan Darah</p>
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
    {{-- </div> --}}

    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 1v16M1 9h16" />
                </svg>
            </p>
        </div>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                </p>
            </div>
            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                </p>
            </div>
            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                </p>
            </div>
            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                </p>
            </div>
        </div>
        <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
            <p class="text-2xl text-gray-400 dark:text-gray-500">
                <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 1v16M1 9h16" />
                </svg>
            </p>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                </p>
            </div>
            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                </p>
            </div>
            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                </p>
            </div>
            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 1v16M1 9h16" />
                    </svg>
                </p>
            </div>
        </div>
    </div>

</x-app-layout>
