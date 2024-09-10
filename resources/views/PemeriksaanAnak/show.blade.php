<x-app-layout>

    <div class="rounded-md bg-white shadow-lg">
        <div class="p-5">
            <div class="sm:flex items-center justify-between">
                <p class="text-gray-500 text-sm font-medium">
                    {{ date_format(date_create($children->tanggal_pemeriksaan), 'd M, Y') }}
                    ({{ \Carbon\Carbon::parse($children['tanggal_pemeriksaan'])->diffForHumans() }})
                </p>
                @if ($children->anak->nik)
                <span
                    class="bg-blue-100 md:block hidden md:ms-3 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">NIK:
                    {{ $children->anak->nik }}</span>
                @endif
            </div>

            <p class="text-orange-400 text-lg font-medium">
                {{ $children->anak->nama }}
            </p>
            <div class="lg:flex justify-between mt-5">
                <div class="lg:flex gap-5 text-gray-500 text-sm font-medium tracking-wide">
                    <div class="space-y-2">
                        <p>Lahir</p>
                        <p class="text-gray-800">{{ $children->anak->tempat_tanggal_lahir }}</p>
                    </div>
                    <div class="lg:mt-0 mt-2 space-y-2">
                        <p>Jenis Kelamin</p>
                        <p class="text-gray-800">{{ $children->anak->jenis_kelamin }}</p>
                    </div>
                    <div class="lg:mt-0 mt-2 space-y-2">
                        <p>Nomor Telepon</p>
                        <p class="text-gray-800">{{ $children->anak->no_tlp }}</p>
                    </div>
                    <div class="lg:mt-0 mt-2 space-y-2">
                        <p>Alamat</p>
                        <p class="text-gray-800">{{ $children->anak->alamat }}</p>
                    </div>
                </div>
                <div class="flex gap-5 text-gray-500 text-sm font-medium tracking-wide">
                    <div class="space-y-2 lg:mt-0 mt-2">
                        <p class="text-right">Petugas Pemeriksa</p>
                        <p class="text-gray-800 lg:text-right">{{ $children->employee->nama }}</p>
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
                            $pemeriksaanSebelumnya && $children->tekanan_darah == $pemeriksaanSebelumnya->tekanan_darah;
                        $isHigher =
                            $pemeriksaanSebelumnya && $children->tekanan_darah > $pemeriksaanSebelumnya->tekanan_darah;
                    @endphp

                    <p
                        class="{{ !$pemeriksaanSebelumnya ? 'text-gray-500' : ($isEqual ? 'text-green-500' : ($isHigher ? 'text-red-500' : 'text-green-500')) }} font-medium">
                        <i
                            class="fa-solid {{ !$pemeriksaanSebelumnya ? '' : ($isEqual ? '' : ($isHigher ? 'fa-arrow-up' : 'fa-arrow-down')) }}"></i>
                        @if ($isEqual)
                            ~
                        @endif
                        <span class="text-gray-800">{{ $children->tekanan_darah }}</span>
                        <span class="text-gray-500">mmHg</span>
                    </p>

                    <p class="text-gray-500">Berat Badan</p>
                    @php
                        $isEqual =
                            $pemeriksaanSebelumnya && $children->berat_badan == $pemeriksaanSebelumnya->berat_badan;
                        $isHigher =
                            $pemeriksaanSebelumnya && $children->berat_badan > $pemeriksaanSebelumnya->berat_badan;
                    @endphp

                    <p
                        class="{{ !$pemeriksaanSebelumnya ? 'text-gray-500' : ($isEqual ? 'text-green-500' : ($isHigher ? 'text-red-500' : 'text-green-500')) }} font-medium">
                        <i
                            class="fa-solid {{ !$pemeriksaanSebelumnya ? '' : ($isEqual ? '' : ($isHigher ? 'fa-arrow-up' : 'fa-arrow-down')) }}"></i>
                        @if ($isEqual)
                            ~
                        @endif
                        <span class="text-gray-800">{{ $children->berat_badan }}</span>
                        <span class="text-gray-500">kg</span>
                    </p>

                    <p class="text-gray-500">Tinggi Badan</p>
                    @php
                        $isEqual =
                            $pemeriksaanSebelumnya && $children->tinggi_badan == $pemeriksaanSebelumnya->tinggi_badan;
                        $isHigher =
                            $pemeriksaanSebelumnya && $children->tinggi_badan > $pemeriksaanSebelumnya->tinggi_badan;
                    @endphp

                    <p
                        class="{{ !$pemeriksaanSebelumnya ? 'text-gray-500' : ($isEqual ? 'text-green-500' : ($isHigher ? 'text-red-500' : 'text-green-500')) }} font-medium">
                        <i
                            class="fa-solid {{ !$pemeriksaanSebelumnya ? '' : ($isEqual ? '' : ($isHigher ? 'fa-arrow-up' : 'fa-arrow-down')) }}"></i>
                        @if ($isEqual)
                            ~
                        @endif
                        <span class="text-gray-800">{{ $children->tinggi_badan }}</span>
                        <span class="text-gray-500">cm</span>
                    </p>

                    <p class="text-gray-500">Suhu Tubuh</p>
                    @php
                        $isEqual =
                            $pemeriksaanSebelumnya && $children->suhu_tubuh == $pemeriksaanSebelumnya->suhu_tubuh;
                        $isHigher =
                            $pemeriksaanSebelumnya && $children->suhu_tubuh > $pemeriksaanSebelumnya->suhu_tubuh;
                    @endphp

                    <p
                        class="{{ !$pemeriksaanSebelumnya ? 'text-gray-500' : ($isEqual ? 'text-green-500' : ($isHigher ? 'text-red-500' : 'text-green-500')) }} font-medium">
                        <i
                            class="fa-solid {{ !$pemeriksaanSebelumnya ? '' : ($isEqual ? '' : ($isHigher ? 'fa-arrow-up' : 'fa-arrow-down')) }}"></i>
                        @if ($isEqual)
                            ~
                        @endif
                        <span class="text-gray-800">{{ $children->suhu_tubuh }}<span class="text-gray-500">°C</span></span>
                        
                    </p>

                    <p class="text-gray-500">Status Imunisasi</p>
                    <p class="text-gray-800 font-medium">
                        {{ $children->status_imunisasi }}
                    </p>

                    <p class="text-gray-500">Riwayat Penyakit</p>
                    <p class="text-gray-800 font-medium">
                        {{ $children->riwayat_penyakit }}
                    </p>

                    <p class="text-gray-500">Catatan</p>
                    <p class="text-gray-800 font-medium">{{ $children->catatan }}</p>
                </div>
            </div>
            @if ($count == 1 || $children->tanggal_pemeriksaan == $pemeriksaanSebelumnya->tanggal_pemeriksaan)
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
                        <p class="text-gray-500">Suhu Tubuh</p>
                        <p class="text-gray-800 font-medium">{{ $pemeriksaanSebelumnya->suhu_tubuh }}<span class="text-gray-500">°C</span></p>
                        <p class="text-gray-500">Status Imunisasi</p>
                        <p class="text-gray-800 font-medium">{{ $pemeriksaanSebelumnya->status_imunisasi }}</p>
                        <p class="text-gray-500">Riwayat Penyakit</p>
                        <p class="text-gray-800 font-medium">{{ $pemeriksaanSebelumnya->riwayat_penyakit }}</p>
                        <p class="text-gray-500">Catatan</p>
                        <p class="text-gray-800 font-medium">{{ $pemeriksaanSebelumnya->catatan }}</p>
                    </div>
                </div>
            @endif
        </div>
    </div>


</x-app-layout>
