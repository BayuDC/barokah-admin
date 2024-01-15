<x-section title="Daftar Kategori" full>
    <x-slot:header>
        <a href="/admin/categories/create"
            class="w-full md:w-auto bg-indigo-500 text-white block active:bg-indigo-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none ease-linear transition-all duration-150 whitespace-nowrap"
            type="button">
            <i class="fas fa-plus"></i> Tambah
        </a>
    </x-slot:header>
    <x-table :columns="['Id', 'Nama']">
        @foreach ($categories as $category)
            <tr>
                <x-table-cell>
                    {{ $category['id'] }}
                </x-table-cell>
                <x-table-cell>
                    {{ $category['name'] }}
                </x-table-cell>
                <x-table-cell>
                    <a class="text-xs bg-lightBlue-500 text-white active:bg-lightBlue-600 font-bold uppercase  px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        type="button" href="/admin/categories/update/{{ $category['id'] }}">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <button type="button"
                        class="text-xs bg-red-500 text-white active:bg-red-600 font-bold uppercase  px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                        x-on:click="selected = { id: {{ $category['id'] }}, name: '{{ $category['name'] }}' }">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                </x-table-cell>
            </tr>
        @endforeach
    </x-table>
</x-section>
