<div x-data="{ selected: null }">
    <x-section title="Daftar Produk" full>
        <x-slot:header>
            <div class="relative md:max-w-60">
                <form wire:submit="search" class="flex flex-wrap w-full">
                    <input type="text" placeholder="Cari produk" wire:model="query"
                        class="px-2 py-1 placeholder-blueGray-300 text-blueGray-600 relative bg-white rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline w-full pr-10" />
                    <button
                        class="z-10 h-full leading-snug font-normal text-center text-blueGray-300 absolute bg-transparent rounded text-base items-center justify-center w-8 right-0 pr-2 py-1">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>

            <a href="/admin/products/create"
                class="w-full md:w-auto bg-indigo-500 text-white block active:bg-indigo-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none ease-linear transition-all duration-150 whitespace-nowrap"
                type="button">
                <i class="fas fa-plus"></i> Tambah
            </a>
        </x-slot:header>

        <table class="items-center w-full bg-transparent border-collapse h-full">
            <thead class="sticky top-0">
                <tr class="">
                    <th
                        class="px-6 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500">
                        Id
                    </th>
                    <th
                        class="px-6 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500">
                        Nama
                    </th>
                    <th
                        class="px-6 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500">
                        Harga
                    </th>
                    <th
                        class="px-6 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500">
                        Satuan
                    </th>
                    <th
                        class="px-6 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500">
                        Gambar
                    </th>
                    <th
                        class="px-6 align-middle py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0  whitespace-nowrap p-4">
                            {{ $product['id'] }}
                        </td>
                        <td
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0  whitespace-nowrap p-4">
                            {{ $product['name'] }}
                        </td>
                        <td
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0  whitespace-nowrap p-4">
                            {{ $product['price'] }}
                        </td>
                        <td
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0  whitespace-nowrap p-4">
                            {{ $product['unit'] }}
                        </td>
                        <td
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0  whitespace-nowrap p-4">
                            <img src="{{ $product['picture_url'] }}"
                                class="h-20 w-20 rounded border"
                                alt="..." />
                        </td>
                        <td
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                            <a class="bg-lightBlue-500 text-white active:bg-lightBlue-600 font-bold uppercase  px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                type="button" href="/admin/products/update/{{ $product['id'] }}">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <button type="button"
                                class="bg-red-500 text-white active:bg-red-600 font-bold uppercase  px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                x-on:click="selected = { id: {{ $product['id'] }}, name: '{{ $product['name'] }}' }">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <x-slot:footer>
            <livewire:product-delete />
            {{ $products->links('components.pagination', data: ['scrollTo' => false]) }}
        </x-slot>
    </x-section>


</div>
