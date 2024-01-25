<div x-data="{ selected: null }">
    <x-section title="Daftar Kategori" full>
        <x-slot:header>
            @can('manage-category')
                <x-button-create href="/admin/categories/create" />
            @endcan
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
                        @can('manage-category')
                            <x-button-update href="/admin/categories/update/{{ $category['id'] }}" />
                            <x-button-delete
                                x-on:click="selected = { id: {{ $category['id'] }}, name: '{{ $category['name'] }}' }" />
                        @endcan
                    </x-table-cell>
                </tr>
            @endforeach
        </x-table>
        <x-slot:footer>
            @can('manage-category')
                <livewire:category-delete />
            @endcan
        </x-slot:footer>
    </x-section>
</div>
