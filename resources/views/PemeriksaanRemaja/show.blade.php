<x-app-layout>

    <div class="rounded-md bg-white shadow-lg">
        <div class="p-5">
            <div class="sm:flex items-center justify-between">
            <p class="text-gray-500 text-sm font-medium">
                {{ date_format(date_create($remajas->tanggal_pemeriksaan), 'd M, Y') }}
                ({{ \Carbon\Carbon::parse($remajas['tanggal_pemeriksaan'])->diffForHumans() }})
            </p>
            <span
                    class="bg-blue-100 md:block hidden md:ms-3 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">NIK: {{ $remajas->remaja->nik }}</span>
        </div>

            <div class="sm:flex items-center">
                <p class="text-orange-400 text-lg font-medium">
                    {{ $remajas->remaja->nama }}
                </p>
                <span
                    class="bg-green-100 sm:ms-3 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Gol. Darah
                    : {{ $remajas->remaja->golongan_darah }}</span>
            </div>
            <div class="lg:flex justify-between mt-5">
                <div class="lg:flex gap-5 text-gray-500 text-sm font-medium tracking-wide">
                    <div class="space-y-2">
                        <p>Lahir</p>
                        <p class="text-gray-800">{{ $remajas->remaja->tempat_tanggal_lahir }}</p>
                    </div>
                    <div class="lg:mt-0 mt-2 space-y-2">
                        <p>Nomor Telepon</p>
                        <p class="text-gray-800">{{ $remajas->remaja->no_tlp }}</p>
                    </div>
                    <div class="lg:mt-0 mt-2 space-y-2">
                        <p>Jenis Kelamin</p>
                        <p class="text-gray-800">{{ $remajas->remaja->jenis_kelamin }}</p>
                    </div>
                    <div class="lg:mt-0 mt-2 space-y-2">
                        <p>Alamat</p>
                        <p class="text-gray-800">{{ $remajas->remaja->alamat }}</p>
                    </div>
                </div>
                <div class="flex gap-5 text-gray-500 text-sm font-medium tracking-wide">
                    <div class="space-y-2 lg:mt-0 mt-2">
                        <p class="text-right">Petugas Pemeriksa</p>
                        <p class="text-gray-800 lg:text-right">{{ $remajas->employee->name }}</p>
                    </div>
                </div>
            </div>
        </div>
        <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700">
        <div class="lg:grid grid-cols-2">
            <div class="border-r p-5 space-y-3 text-sm">
                <p class="text-orange-400 text-sm font-medium">Detail Pemeriksaan Saat ini</p>
                <div class="grid grid-cols-2 gap-3">
                    <p class="text-gray-500">Tekanan Darah</p>
                    @php
                        $isEqual =
                            $pemeriksaanSebelumnya && $remajas->tekanan_darah == $pemeriksaanSebelumnya->tekanan_darah;
                        $isHigher =
                            $pemeriksaanSebelumnya && $remajas->tekanan_darah > $pemeriksaanSebelumnya->tekanan_darah;
                    @endphp

                    <p
                        class="{{ !$pemeriksaanSebelumnya ? 'text-gray-500' : ($isEqual ? 'text-green-500' : ($isHigher ? 'text-red-500' : 'text-green-500')) }} font-medium">
                        <i
                            class="fa-solid {{ !$pemeriksaanSebelumnya ? '' : ($isEqual ? '' : ($isHigher ? 'fa-arrow-up' : 'fa-arrow-down')) }}"></i>
                        @if ($isEqual)
                            ~
                        @endif
                        <span class="text-gray-800">{{ $remajas->tekanan_darah }}</span>
                        <span class="text-gray-500">mmHg</span>
                    </p>

                    <p class="text-gray-500">Berat Badan</p>
                    @php
                        $isEqual =
                            $pemeriksaanSebelumnya && $remajas->berat_badan == $pemeriksaanSebelumnya->berat_badan;
                        $isHigher =
                            $pemeriksaanSebelumnya && $remajas->berat_badan > $pemeriksaanSebelumnya->berat_badan;
                    @endphp

                    <p
                        class="{{ !$pemeriksaanSebelumnya ? 'text-gray-500' : ($isEqual ? 'text-green-500' : ($isHigher ? 'text-red-500' : 'text-green-500')) }} font-medium">
                        <i
                            class="fa-solid {{ !$pemeriksaanSebelumnya ? '' : ($isEqual ? '' : ($isHigher ? 'fa-arrow-up' : 'fa-arrow-down')) }}"></i>
                        @if ($isEqual)
                            ~
                        @endif
                        <span class="text-gray-800">{{ $remajas->berat_badan }}</span>
                        <span class="text-gray-500">kg</span>
                    </p>

                    <p class="text-gray-500">Tinggi Badan</p>
                    @php
                        $isEqual =
                            $pemeriksaanSebelumnya && $remajas->tinggi_badan == $pemeriksaanSebelumnya->tinggi_badan;
                        $isHigher =
                            $pemeriksaanSebelumnya && $remajas->tinggi_badan > $pemeriksaanSebelumnya->tinggi_badan;
                    @endphp

                    <p
                        class="{{ !$pemeriksaanSebelumnya ? 'text-gray-500' : ($isEqual ? 'text-green-500' : ($isHigher ? 'text-red-500' : 'text-green-500')) }} font-medium">
                        <i
                            class="fa-solid {{ !$pemeriksaanSebelumnya ? '' : ($isEqual ? '' : ($isHigher ? 'fa-arrow-up' : 'fa-arrow-down')) }}"></i>
                        @if ($isEqual)
                            ~
                        @endif
                        <span class="text-gray-800">{{ $remajas->tinggi_badan }}</span>
                        <span class="text-gray-500">cm</span>
                    </p>

                    <p class="text-gray-500">Pemberian Vitamin</p>
                    <p class="font-medium">
                        <span class="text-gray-800">{{ $remajas->pemberian_vitamin }}</span>
                    </p>

                    <p class="text-gray-500">Konseling Kesehatan</p>
                    @php
                        $isEqual =
                            $pemeriksaanSebelumnya &&
                            $remajas->konseling_kesehatan == $pemeriksaanSebelumnya->konseling_kesehatan;
                        $isHigher =
                            $pemeriksaanSebelumnya &&
                            $remajas->konseling_kesehatan > $pemeriksaanSebelumnya->konseling_kesehatan;
                    @endphp

                    <p class="font-medium">
                        <span class="text-gray-800">{{ $remajas->konseling_kesehatan }}</span>
                    </p>

                    <p class="text-gray-500">Catatan</p>
                    <p class="text-gray-800 font-medium">{{ $remajas->catatan }}</p>
                </div>
            </div>
            @if ($count == 1 || $remajas->tanggal_pemeriksaan == $pemeriksaanSebelumnya->tanggal_pemeriksaan)
                <div class="flex items-center justify-center">
                    <p class="text-gray-500">Tidak ada data sebelumnya</p>
                </div>
            @else
                <div class="p-5 space-y-3 text-sm">
                    <div class="flex justify-between">
                        <p class="text-orange-400 text-sm font-medium">Detail Pemeriksaan Sebelumnya</p>
                        <p class="text-gray-500 text-sm font-medium md:block hidden">
                            {{ date_format(date_create($pemeriksaanSebelumnya->tanggal_pemeriksaan), 'd M, Y') }}
                        </p>
                    </div>
                    <div class="grid grid-cols-2 gap-3">
                        <p class="text-gray-500">Tekanan Darah</p>
                        <p class="text-gray-800 font-medium">{{ $pemeriksaanSebelumnya->tekanan_darah }} <span
                                class="text-gray-500">mmHg</span></p>
                        <p class="text-gray-500">Berat Badan</p>
                        <p class="text-gray-800 font-medium">{{ $pemeriksaanSebelumnya->berat_badan }} <span
                                class="text-gray-500">kg</span></p>
                        <p class="text-gray-500">Tinggi Badan</p>
                        <p class="text-gray-800 font-medium">{{ $pemeriksaanSebelumnya->tinggi_badan }} <span
                                class="text-gray-500">cm</span></p>
                        <p class="text-gray-500">Pemberian Vitamin</p>
                        <p class="text-gray-800 font-medium">{{ $pemeriksaanSebelumnya->pemberian_vitamin }}</p>
                        <p class="text-gray-500">Konseling Kesehatan</p>
                        <p class="text-gray-800 font-medium">{{ $pemeriksaanSebelumnya->konseling_kesehatan }}</p>
                        <p class="text-gray-500">Catatan</p>
                        <p class="text-gray-800 font-medium">{{ $pemeriksaanSebelumnya->catatan }}</p>
                    </div>
                </div>
            @endif
        </div>
    </div>


</x-app-layout>
