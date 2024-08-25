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
                            <th scope="row"
                                class="text-right font-medium whitespace-nowrap dark:text-white">
                                {{ Str::limit($mom->employee->name, 17, '...') }}
                            </th>
                        </tr>
                        <tr>
                            <td class="py-1 text-orange-400">
                                Tanggal Periksa
                            </td>
                            <th scope="row"
                                class="text-right font-medium dark:text-white">
                                {{ date_format(date_create($mom->created_at), 'd M, Y') }}
                            </th>
                        </tr>
                        <tr>
                            <td class="py-1 text-orange-400">
                                Riwayat Penyakit
                            </td>
                            <th scope="row"
                                class="text-right font-medium dark:text-white">
                                {{ $mom->riwayat_penyakit }}
                            </th>
                        </tr>
                        <tr>
                            <td class="py-1 text-orange-400">
                                Kondisi Bayi
                            </td>
                            <th scope="row"
                                class="text-right font-medium dark:text-white">
                                {{ $mom->riwayat_penyakit }}
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="lg:col-span-6 col-span-12">
            <div class="grid grid-cols-2 gap-5">
                <div class="col-span-2 rounded-lg px-5 py-5 bg-gray-50 shadow-lg">
                    <h1 class="lg:text-2xl text-lg lg:text-left text-center font-medium text-orange-400">
                        {{ $mom->ibuHamil->nama }}</h1>
                    <h1 class="lg:text-lg text-md lg:text-left text-center text-gray-400">Kehamilan ke-{{ $mom->ibuHamil->nomor_kehamilan }}
                    </h1>
                </div>
                <div class="col-span-1 rounded-lg bg-gray-50 shadow-lg">
                    <div class="py-3 px-5 border-b">
                        <h1 class="font-medium text-md text-orange-400">Kadar Gula Darah</h1>
                        <h1 class="font-medium text-xl text-gray-500 mt-2">{{ $mom->kadar_gula_darah }} mg/dL</h1>
                    </div>
                    <div class="py-3 px-5 border-b">
                        <h1 class="font-medium text-md text-orange-400">Kadar Kolestrol</h1>
                        <h1 class="font-medium text-xl text-gray-500 mt-2">{{ $mom->kadar_kolestrol }} mg/dL</h1>
                    </div>
                    <div class="py-3 px-5 border-b">
                        <h1 class="font-medium text-md text-orange-400">Kadar Asam Urat</h1>
                        <h1 class="font-medium text-xl text-gray-500 mt-2">{{ $mom->kadar_asam_urat }} mg/dL</h1>
                    </div>
                </div>
                <div class="col-span-1 rounded-lg bg-gray-50 shadow-lg">
                    <div class="py-3 px-5 border-b">
                        <h1 class="font-medium text-md text-orange-400">Usia Kehailan</h1>
                        <h1 class="font-medium text-xl text-gray-500 mt-2">{{ $mom->ibuHamil->usia_kehamilan . ' Bulan' }}</h1>
                    </div>
                    <div class="py-3 px-5 border-b">
                        <h1 class="font-medium text-md text-orange-400">Tanggal Persalinan</h1>
                        <h1 class="font-medium text-xl text-gray-500 mt-2">{{ $mom->ibuHamil->tanggal_persalinan }}</h1>
                    </div>
                    <div class="py-3 px-5 border-b">
                        <h1 class="font-medium text-md text-orange-400">Penolong Persalinan</h1>
                        <h1 class="font-medium text-xl text-gray-500 mt-2">{{ $mom->ibuHamil->penolong_persalinan }}</h1>
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
                                Sistolik
                            </td>
                            <th scope="row"
                                class="text-right font-medium dark:text-white">
                                {{ $mom->tekanan_darah_sistolik . ' mmHg' }}
                            </th>
                        </tr>
                        <tr>
                            <td class="py-1 text-orange-400">
                                Diastolik
                            </td>
                            <th scope="row"
                                class="text-right font-medium dark:text-white">
                                {{ $mom->tekanan_darah_diastolik . ' mmHg' }}
                            </th>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="inline-flex items-center justify-center w-full">
                                    <hr class="w-full h-px bg-gray-200 border-0 dark:bg-gray-700">
                                    <span class="absolute px-3 font-medium -translate-x-1/2 bg-white left-1/2 dark:text-white dark:bg-gray-900">Catatan</span>
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

</x-app-layout>
