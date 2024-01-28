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
    <x-table :columns="['Id', 'Foto', 'Produk', 'Stok']">
        @foreach ($products as $product)
            <x-table-row x-data="{ stock: null }">
                <x-table-cell>{{ $product->id }}</x-table-cell>
                <x-table-cell>
                    <x-photo :url="$product['picture_url']"></x-photo>
                </x-table-cell>
                <x-table-cell>
                    {{ $product->name }}<span
                        class="text-sm font-bold text-blueGray-400">/{{ $product->unit }}</span></x-table-cell>
                <x-table-cell>
                    @if ($product->stock < 20)
                        <span
                            class="text-lg font-semibold inline-block py-1 px-3 rounded text-red-600 bg-red-200 uppercase last:mr-0 mr-1">
                            {{ $product->stock }}
                        </span>
                    @elseif($product->stock < 40)
                        <span
                            class="text-lg font-semibold inline-block py-1 px-3 rounded text-amber-600 bg-amber-200 uppercase last:mr-0 mr-1">
                            {{ $product->stock }}
                        </span>
                    @else
                        <span
                            class="text-lg font-semibold inline-block py-1 px-3 rounded text-lightBlue-600 bg-lightBlue-200 uppercase last:mr-0 mr-1">
                            {{ $product->stock }}
                        </span>
                    @endif
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
            </x-table-row>
        @endforeach
    </x-table>
    <x-slot:footer>
        {{ $products->links('components.pagination', data: ['scrollTo' => false]) }}
    </x-slot>
</x-section>
