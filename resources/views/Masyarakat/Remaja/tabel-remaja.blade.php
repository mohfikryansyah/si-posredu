<table id="table_pemeriksaan_remaja">
    <thead>
        <tr>
            <th scope="col">Nama</th>
            <th scope="col">Tgl. Periksa</th>
            <th scope="col">Pemberian Vitamin</th>
            <th scope="col">Petugas Pemeriksa</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pemeriksaans as $pemeriksaan)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th class="whitespace-nowrap">
                    <a class="hover:text-orange-400 duration-300"
                        href="{{ route('pemeriksaanRemaja-show', $pemeriksaan->id) }}">{{ $pemeriksaan->remaja->nama }}</a>
                </th>
                <td class="whitespace-nowrap md:whitespace-normal">
                    {{ date_format(date_create($pemeriksaan->tanggal_pemeriksaan), 'd/m/Y') }}
                </td>
                <td class="whitespace-nowrap md:whitespace-normal">
                    {{ $pemeriksaan->pemberian_vitamin }}
                </td>
                <td class="whitespace-nowrap md:whitespace-normal">
                    {{ $pemeriksaan->employee->nama }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@push('tabel_remaja')
    <script>
        new DataTable('#table_pemeriksaan_remaja', {
            order: []
        });
    </script>
@endpush