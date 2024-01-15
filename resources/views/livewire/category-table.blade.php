<div x-data="{ selected: null }">
    <x-section title="Daftar Kategori" full>
        <x-slot:header>
            <x-button-create href="/admin/categories/create" />
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
                        <x-button-update href="/admin/categories/update/{{ $category['id'] }}" />
                        <x-button-delete
                            x-on:click="selected = { id: {{ $category['id'] }}, name: '{{ $category['name'] }}' }" />
                    </x-table-cell>
                </tr>
            @endforeach
        </x-table>
        <x-slot:footer>
            <livewire:category-delete />
        </x-slot:footer>
    </x-section>
</div>
