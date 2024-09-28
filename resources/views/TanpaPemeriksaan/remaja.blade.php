<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold md:text-xl text-lg text-gray-800 leading-tight">
            {{ __('Remaja Tanpa Pemeriksaan') }}
        </h2>
    </x-slot>

    

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-white mt-4">
        <table id="table_pemeriksaan_ibu">
            <thead>
                <tr>
                    <th scope="col" class="whitespace-normal">Nama</th>
                    <th scope="col" class="whitespace-normal">Tgl. Pemeriksaan yang terlewat</th>
                    <th scope="col" class="whitespace-normal">Judul Pemeriksaan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tanpaPemeriksaanRemaja as $tpr)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th class="whitespace-nowrap">
                            {{ $tpr->nama }}
                        </th>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ date_format(date_create($tpr->tanggal_pelayanan), 'd F, Y') }}
                        </td>
                        <td class="whitespace-nowrap md:whitespace-normal">
                            {{ $tpr->judul_pelayanan }}
                        </td>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <x-slot:script>
        <script>
            new DataTable('#table_pemeriksaan_ibu', {
                order: []
            });
        </script>
    </x-slot:script>

</x-app-layout>
