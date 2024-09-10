<table id="table_pemeriksaan_ibu">
    <thead>
        <tr>
            <th scope="col" class="whitespace-normal">Nama</th>
            <th scope="col" class="whitespace-normal">Tgl. Pemeriksaan</th>
            <th scope="col" class="whitespace-normal">Usia Kehamilan</th>
            <th scope="col" class="whitespace-normal">Tekanan Darah</th>
            <th scope="col" class="whitespace-normal">Petugas</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pemeriksaans as $pemeriksaan)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th class="whitespace-nowrap">
                    <a class="hover:text-orange-400 duration-300"
                        href="{{ route('pemeriksaanIbu-show', $pemeriksaan->id) }}">{{ $pemeriksaan->ibu->nama }}</a>
                </th>
                <td class="whitespace-nowrap md:whitespace-normal">
                    {{ date_format(date_create($pemeriksaan->tanggal_pemeriksaan), 'd/m/Y') }}
                </td>
                <td class="whitespace-nowrap md:whitespace-normal">
                    {{ $pemeriksaan->usia_kehamilan }}
                </td>
                <td class="whitespace-nowrap md:whitespace-normal">
                    {{ $pemeriksaan->tekanan_darah }}
                </td>
                <td class="whitespace-nowrap md:whitespace-normal">
                    {{ $pemeriksaan->employee->nama }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


@push('tabel_ibu')
    <script>
        new DataTable('#table_pemeriksaan_ibu', {
            order: []
        });
    </script>
@endpush
