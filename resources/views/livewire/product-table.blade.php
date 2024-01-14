<div class="w-full mb-6 px-4">
    <div x-data="{ selected: null }">
        <div class="relative flex flex-col min-w-0 break-words w-full shadow-lg rounded bg-white"
            style="height: calc(100vh - 2rem)">
            <div class="rounded-t mb-0 px-4 py-3 border-0">
                <div class="flex flex-col md:flex-row flex-wrap items-center gap-4">
                    <h3 class="font-semibold text-xl text-blueGray-700 w-full lg:w-auto lg:mr-auto">
                        Daftar Produk
                    </h3>
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
                </div>
            </div>
            <div class="block w-full overflow-x-auto mb-auto">
                <table class="items-center w-full bg-transparent border-collapse h-full">
                    <thead>
                        <tr>
                            <th
                                class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                Id
                            </th>
                            <th
                                class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                Nama
                            </th>
                            <th
                                class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                Harga
                            </th>
                            <th
                                class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                Satuan
                            </th>
                            <th
                                class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                                Gambar
                            </th>
                            <th
                                class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-blueGray-50 text-blueGray-500 border-blueGray-100">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0  whitespace-nowrap p-4">
                                    {{ $product['id'] }}
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0  whitespace-nowrap p-4">
                                    {{ $product['name'] }}
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0  whitespace-nowrap p-4">
                                    {{ $product['price'] }}
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0  whitespace-nowrap p-4">
                                    {{ $product['unit'] }}
                                </td>
                                <td class="border-t-0 px-6 align-middle border-l-0 border-r-0  whitespace-nowrap p-4">
                                    <div class="h-12 w-12 bg-white rounded border" alt="..." />
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
            </div>
            <div class="bg-blueGray-50 text-blueGray-500 px-4 py-3">
                {{ $products->links('components.pagination', data: ['scrollTo' => false]) }}
            </div>
        </div>
        <livewire:product-delete />
    </div>
</div>
