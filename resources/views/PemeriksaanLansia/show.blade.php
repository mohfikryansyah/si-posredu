<x-app-layout>

    <div class="rounded-md bg-white shadow-lg">
        <div class="p-5">
            <p class="text-gray-500 text-sm font-medium">
                {{ date_format(date_create($lansias->tanggal_pemeriksaan), 'd M, Y') }}
                ({{ \Carbon\Carbon::parse($lansias['tanggal_pemeriksaan'])->diffForHumans() }})
            </p>
            <p class="text-orange-400 mt-1 text-lg font-medium">
                {{ $lansias->lansia->nama }}
            </p>
            <div class="lg:flex justify-between mt-5">
                <div class="lg:flex gap-5 text-gray-500 text-sm font-medium tracking-wide">
                    <div class="space-y-2">
                        <p>Lahir</p>
                        <p class="text-gray-800">{{ $lansias->lansia->tempat_tanggal_lahir }}</p>
                    </div>
                    <div class="lg:mt-0 mt-2 space-y-2">
                        <p>Nomor Telepon</p>
                        <p class="text-gray-800">{{ $lansias->lansia->no_tlp }}</p>
                    </div>
                    <div class="lg:mt-0 mt-2 space-y-2">
                        <p>Pekerjaan</p>
                        <p class="text-gray-800">{{ $lansias->lansia->pekerjaan }}</p>
                    </div>
                    <div class="lg:mt-0 mt-2 space-y-2">
                        <p>Alamat</p>
                        <p class="text-gray-800">{{ $lansias->lansia->alamat }}</p>
                    </div>
                </div>
                <div class="flex gap-5 text-gray-500 text-sm font-medium tracking-wide">
                    <div class="space-y-2 lg:mt-0 mt-2">
                        <p class="text-right">Petugas Pemeriksa</p>
                        <p class="text-gray-800 lg:text-right">{{ $lansias->employee->name }}</p>
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
                            $pemeriksaanSebelumnya && $lansias->tekanan_darah == $pemeriksaanSebelumnya->tekanan_darah;
                        $isHigher =
                            $pemeriksaanSebelumnya && $lansias->tekanan_darah > $pemeriksaanSebelumnya->tekanan_darah;
                    @endphp

                    <p
                        class="{{ !$pemeriksaanSebelumnya ? 'text-gray-500' : ($isEqual ? 'text-green-500' : ($isHigher ? 'text-red-500' : 'text-green-500')) }} font-medium">
                        <i
                            class="fa-solid {{ !$pemeriksaanSebelumnya ? '' : ($isEqual ? '' : ($isHigher ? 'fa-arrow-up' : 'fa-arrow-down')) }}"></i>
                        @if ($isEqual)
                            ~
                        @endif
                        <span class="text-gray-800">{{ $lansias->tekanan_darah }}</span>
                        <span class="text-gray-500">mmHg</span>
                    </p>

                    <p class="text-gray-500">Kolestrol</p>
                    @php
                        $isEqual = $pemeriksaanSebelumnya && $lansias->kolestrol == $pemeriksaanSebelumnya->kolestrol;
                        $isHigher = $pemeriksaanSebelumnya && $lansias->kolestrol > $pemeriksaanSebelumnya->kolestrol;
                    @endphp

                    <p
                        class="{{ !$pemeriksaanSebelumnya ? 'text-gray-500' : ($isEqual ? 'text-green-500' : ($isHigher ? 'text-red-500' : 'text-green-500')) }} font-medium">
                        <i
                            class="fa-solid {{ !$pemeriksaanSebelumnya ? '' : ($isEqual ? '' : ($isHigher ? 'fa-arrow-up' : 'fa-arrow-down')) }}"></i>
                        @if ($isEqual)
                            ~
                        @endif
                        <span class="text-gray-800">{{ $lansias->kolestrol }}</span>
                        <span class="text-gray-500">mg/dL</span>
                    </p>

                    <p class="text-gray-500">Asam Urat</p>
                    @php
                        $isEqual = $pemeriksaanSebelumnya && $lansias->asam_urat == $pemeriksaanSebelumnya->asam_urat;
                        $isHigher = $pemeriksaanSebelumnya && $lansias->asam_urat > $pemeriksaanSebelumnya->asam_urat;
                    @endphp

                    <p
                        class="{{ !$pemeriksaanSebelumnya ? 'text-gray-500' : ($isEqual ? 'text-green-500' : ($isHigher ? 'text-red-500' : 'text-green-500')) }} font-medium">
                        <i
                            class="fa-solid {{ !$pemeriksaanSebelumnya ? '' : ($isEqual ? '' : ($isHigher ? 'fa-arrow-up' : 'fa-arrow-down')) }}"></i>
                        @if ($isEqual)
                            ~
                        @endif
                        <span class="text-gray-800">{{ $lansias->asam_urat }}</span>
                        <span class="text-gray-500">mg/dL</span>
                    </p>

                    <p class="text-gray-500">Gula Darah</p>
                    @php
                        $isEqual = $pemeriksaanSebelumnya && $lansias->gula_darah == $pemeriksaanSebelumnya->gula_darah;
                        $isHigher = $pemeriksaanSebelumnya && $lansias->gula_darah > $pemeriksaanSebelumnya->gula_darah;
                    @endphp

                    <p
                        class="{{ !$pemeriksaanSebelumnya ? 'text-gray-500' : ($isEqual ? 'text-green-500' : ($isHigher ? 'text-red-500' : 'text-green-500')) }} font-medium">
                        <i
                            class="fa-solid {{ !$pemeriksaanSebelumnya ? '' : ($isEqual ? '' : ($isHigher ? 'fa-arrow-up' : 'fa-arrow-down')) }}"></i>
                        @if ($isEqual)
                            ~
                        @endif
                        <span class="text-gray-800">{{ $lansias->gula_darah }}</span>
                        <span class="text-gray-500">mg/dL</span>
                    </p>

                    <p class="text-gray-500">Suhu Tubuh</p>
                    @php
                        $isEqual = $pemeriksaanSebelumnya && $lansias->suhu_tubuh == $pemeriksaanSebelumnya->suhu_tubuh;
                        $isHigher = $pemeriksaanSebelumnya && $lansias->suhu_tubuh > $pemeriksaanSebelumnya->suhu_tubuh;
                    @endphp

                    <p
                        class="{{ !$pemeriksaanSebelumnya ? 'text-gray-500' : ($isEqual ? 'text-green-500' : ($isHigher ? 'text-red-500' : 'text-green-500')) }} font-medium">
                        <i
                            class="fa-solid {{ !$pemeriksaanSebelumnya ? '' : ($isEqual ? '' : ($isHigher ? 'fa-arrow-up' : 'fa-arrow-down')) }}"></i>
                        @if ($isEqual)
                            ~
                        @endif
                        <span class="text-gray-800">{{ $lansias->suhu_tubuh }}</span>
                        <span class="text-gray-500">mg/dL</span>
                    </p>

                    <p class="text-gray-500">Catatan</p>
                    <p class="text-gray-800 font-medium">{{ $lansias->catatan }}</p>
                </div>
            </div>
            @if ($count == 1 || $lansias->tanggal_pemeriksaan == $pemeriksaanSebelumnya->tanggal_pemeriksaan)
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
                        <p class="text-gray-500">Kolestrol</p>
                        <p class="text-gray-800 font-medium">{{ $pemeriksaanSebelumnya->kolestrol }} <span
                                class="text-gray-500">mg/dL</span></p>
                        <p class="text-gray-500">Asam Urat</p>
                        <p class="text-gray-800 font-medium">{{ $pemeriksaanSebelumnya->asam_urat }} <span
                                class="text-gray-500">mg/dL</span></p>
                        <p class="text-gray-500">Gula Darah</p>
                        <p class="text-gray-800 font-medium">{{ $pemeriksaanSebelumnya->gula_darah }} <span
                                class="text-gray-500">mg/dL</span></p>
                        <p class="text-gray-500">Suhu Tubuh</p>
                        <p class="text-gray-800 font-medium">{{ $pemeriksaanSebelumnya->suhu_tubuh . '°C' }}</p>
                        <p class="text-gray-500">Catatan</p>
                        <p class="text-gray-800 font-medium">{{ $pemeriksaanSebelumnya->catatan }}</p>
                    </div>
                </div>
            @endif
        </div>
    </div>


</x-app-layout>
