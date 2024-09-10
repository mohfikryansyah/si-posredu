<table id="table_pemeriksaan_anak">
    <thead>
        <tr>
            <th scope="col">Nama Anak</th>
            <th scope="col">Tgl. Periksa</th>
            <th scope="col">Catatan</th>
            <th scope="col">Petugas</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pemeriksaans as $pemeriksaan)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th class="whitespace-nowrap" title="{{ $pemeriksaan->anak->nama }}">
                    <a class="hover:text-orange-400 duration-300"
                        href="{{ route('pemeriksaanAnak-show', $pemeriksaan->id) }}">{{ $pemeriksaan->anak->nama }}</a>
                </th>
                <td class="whitespace-nowrap md:whitespace-normal">
                    {{ date_format(date_create($pemeriksaan->tanggal_pemeriksaan), 'd/m/Y') }}
                </td>
                <td class="whitespace-nowrap md:whitespace-normal">
                    {{ Str::limit($pemeriksaan->catatan, 13, ' ') }}
                </td>
                <td class="whitespace-nowrap md:whitespace-normal">
                    {{ Str::limit($pemeriksaan->employee->nama, 13, ' ') }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@push('tabel_anak')
    <script>
        new DataTable('#table_pemeriksaan_anak', {
            order: []
        });
    </script>
@endpush
