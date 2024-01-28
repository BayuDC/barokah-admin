    <x-section title="Daftar Produk" full x-data="{ product: null }">
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
        <x-table :columns="['Id', 'Foto', 'Nama', 'Harga', 'Satuan', 'Kategori']">
            @foreach ($products as $product)
                <x-table-row>
                    <x-table-cell>
                        {{ $product['id'] }}
                    </x-table-cell>
                    <x-table-cell>
                        <x-photo :url="$product['picture_url']" />
                    </x-table-cell>
                    <x-table-cell>
                        {{ $product['name'] }}
                    </x-table-cell>
                    <x-table-cell>
                        Rp{{ $product['price'] }}
                    </x-table-cell>
                    <x-table-cell>
                        {{ $product['unit'] }}
                    </x-table-cell>
                    <x-table-cell>
                        <x-dot :color="$product['category']['color']" />
                        {{ $product['category']['name'] }}
                    </x-table-cell>
                    <x-table-cell>
                        @can('manage-product')
                            <x-button-update href="/admin/products/update/{{ $product['id'] }}" />
                            <x-button-delete
                                x-on:click="product = { id: {{ $product['id'] }}, name: '{{ $product['name'] }}' }" />
                        @endcan
                    </x-table-cell>
                </x-table-row>
            @endforeach
        </x-table>
        <x-slot:footer>
            @can('manage-product')
                <livewire:product-delete />
            @endcan
            {{ $products->links('components.pagination', data: ['scrollTo' => false]) }}
        </x-slot>
    </x-section>
