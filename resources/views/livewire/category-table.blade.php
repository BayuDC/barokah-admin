<x-section title="Daftar Kategori" x-data="{ category: null }" full>
    <x-slot:header>
        <x-search />
        @can('manage-category')
            <x-button-create href="/admin/categories/create" />
        @endcan
    </x-slot:header>
    <x-table :columns="['Id', 'Nama', 'Warna']">
        @foreach ($categories as $category)
            <tr>
                <x-table-cell>
                    {{ $category['id'] }}
                </x-table-cell>
                <x-table-cell>
                    {{ $category['name'] }}
                </x-table-cell>
                <x-table-cell>
                    <x-dot :color="$category->color" />
                </x-table-cell>
                <x-table-cell>
                    @can('manage-category')
                        <x-button-update href="/admin/categories/update/{{ $category['id'] }}" />
                        <x-button-delete
                            x-on:click="category = { id: {{ $category['id'] }}, name: '{{ $category['name'] }}' }" />
                    @endcan
                </x-table-cell>
            </tr>
        @endforeach
    </x-table>
    <x-slot:footer>
        @can('manage-category')
            <livewire:category-delete />
        @endcan
        {{ $categories->links('components.pagination', data: ['scrollTo' => false]) }}
    </x-slot:footer>
</x-section>
