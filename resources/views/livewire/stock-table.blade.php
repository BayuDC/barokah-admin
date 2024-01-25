<x-section title="Stok Produk" full>
    <x-slot:header>
        <x-filter model="filter.category">
            <option value="0">Semua Kategori</option>
            @foreach ($categories as $category)
                <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
            @endforeach
        </x-filter>
        <x-search />
    </x-slot:header>
    <x-table :columns="['Id', 'Produk', 'Stok']">
        @foreach ($products as $product)
            <tr x-data="{ stock: null }">
                <x-table-cell>{{ $product->id }}</x-table-cell>
                <x-table-cell>{{ $product->name }}<span
                        class="text-xs font-bold opacity-60">/{{ $product->unit }}</span></x-table-cell>
                <x-table-cell>
                    <div class="text-xl font-bold {{ $product->stock <= 10 ? 'text-red-500' : 'text-blueGray-600' }}">
                        {{ $product->stock }}</div>
                </x-table-cell>
                <x-table-cell>
                    @can('manage-stock')
                        <form class="flex gap-2"
                            x-on:submit.prevent="() => {
                            $wire.restock({{ $product->id }}, stock)
                            $refs.input.blur()
                            stock = null
                        }">
                            <input type="number" x-model.number="stock" x-ref="input" placeholder="0"
                                class="px-2 py-1 placeholder-blueGray-300 text-blueGray-600 relative bg-white  rounded text-sm border border-blueGray-300 outline-none focus:outline-none focus:shadow-outline " />

                            <button
                                class="w-full md:w-auto bg-indigo-500 text-white block active:bg-indigo-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none ease-linear transition-all duration-150 whitespace-nowrap"
                                type="submit">
                                <i class="fas fa-plus"></i> Tambah
                            </button>
                        </form>
                    @endcan

                </x-table-cell>
            </tr>
        @endforeach
    </x-table>
    <x-slot:footer>
        {{ $products->links('components.pagination', data: ['scrollTo' => false]) }}
    </x-slot>
</x-section>
