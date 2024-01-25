<div x-data="{ selected: null }">
    <x-section title="Daftar Produk" full>
        <x-slot:header>
            <x-filter model="filter.category">
                <option value="0">Semua Kategori</option>
                @foreach ($categories as $category)
                    <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                @endforeach
            </x-filter>
            <x-search />
            @can('manage-product')
                <x-button-create href="/admin/products/create" />
            @endcan
        </x-slot:header>
        <x-table :columns="['Id', 'Nama', 'Harga', 'Satuan', 'Gambar', 'Kategori']">

            @foreach ($products as $product)
                <tr>
                    <x-table-cell>
                        {{ $product['id'] }}
                    </x-table-cell>
                    <x-table-cell>
                        {{ $product['name'] }}
                    </x-table-cell>
                    <x-table-cell>
                        {{ $product['price'] }}
                    </x-table-cell>
                    <x-table-cell>
                        {{ $product['unit'] }}
                    </x-table-cell>
                    <x-table-cell>
                        <img src="{{ $product['picture_url'] }}"
                            class="h-20 w-20 rounded border" />
                    </x-table-cell>
                    <x-table-cell>
                        {{ $product['category']['name'] }}
                    </x-table-cell>
                    <x-table-cell>
                        @can('manage-product')
                            <x-button-update href="/admin/products/update/{{ $product['id'] }}" />
                            <x-button-delete
                                x-on:click="selected = { id: {{ $product['id'] }}, name: '{{ $product['name'] }}' }" />
                        @endcan
                    </x-table-cell>
                </tr>
            @endforeach
        </x-table>
        <x-slot:footer>
            @can('manage-product')
                <livewire:product-delete />
            @endcan
            {{ $products->links('components.pagination', data: ['scrollTo' => false]) }}
        </x-slot>
    </x-section>
</div>
