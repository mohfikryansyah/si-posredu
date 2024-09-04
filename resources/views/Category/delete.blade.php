<!-- Modal Component -->
<x-modal name="delete_category" :show="false" maxWidth="xl">
    <form method="POST" action="{{ route('category.destroy') }}" class="p-6">
        @csrf
        @method('delete')

        <h2 class="text-lg font-medium text-gray-900">
            Apakah anda yakin untuk menghapus kategori <span id="delete_nama"></span> ?
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            Setelah data dihapus, semua artikel yang berkaitan dengan kategori ini akan dihapus secara permanen.
        </p>

        <input type="hidden" id="delete_id" name="id"></input>

        <div class="mt-6 flex justify-end">
            <x-secondary-button x-on:click="$dispatch('close')">
                {{ __('Batal') }}
            </x-secondary-button>

            <x-danger-button class="ms-3">
                {{ __('Hapus') }}
            </x-danger-button>
        </div>
    </form>
</x-modal>


