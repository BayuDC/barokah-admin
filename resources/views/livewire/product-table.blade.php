<div x-data="{ selected: null }">
    <x-section title="Daftar Produk" full>
        <x-slot:header>
            <x-search />
            <x-button-create href="/admin/products/create" />
        </x-slot:header>
        <x-table :columns="['Id', 'Nama', 'Harga', 'Satuan', 'Gambar']">

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
                        <x-button-update href="/admin/products/update/{{ $product['id'] }}" />
                        <x-button-delete
                            x-on:click="selected = { id: {{ $product['id'] }}, name: '{{ $product['name'] }}' }" />

                    </x-table-cell>
                </tr>
            @endforeach
        </x-table>
        <x-slot:footer>
            <livewire:product-delete />
            {{ $products->links('components.pagination', data: ['scrollTo' => false]) }}
        </x-slot>
    </x-section>


</div>
