<table id="table_pemeriksaan_lansia">
    <thead>
        <tr>
            <th scope="col">Nama</th>
            <th scope="col">Tgl. Periksa</th>
            <th scope="col">Catatan</th>
            <th scope="col">Petugas Pemeriksa</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pemeriksaans as $pemeriksaan)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th class="whitespace-nowrap">
                    <a class="hover:text-orange-400 duration-300"
                        href="{{ route('pemeriksaanLansia-show', $pemeriksaan->id) }}">{{ $pemeriksaan->lansia->nama }}</a>
                </th>
                <td class="whitespace-nowrap md:whitespace-normal">
                    {{-- {{ $pemeriksaan->tanggal_pemeriksaan }} --}}
                    {{ date_format(date_create($pemeriksaan->tanggal_pemeriksaan), 'd/m/Y') }}
                </td>
                <td class="whitespace-nowrap md:whitespace-normal">
                    {{ $pemeriksaan->catatan }}
                </td>
                <td class="whitespace-nowrap md:whitespace-normal">
                    {{ $pemeriksaan->employee->nama }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@push('tabel_lansia')
    <script>
        new DataTable('#table_pemeriksaan_lansia', {
            order: []
        });
    </script>
@endpush
