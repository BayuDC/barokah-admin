<x-section full title="Daftar Karyawan">
    <x-slot:header>
        <x-search />
        <x-button-create href="/admin/workers/create" />
    </x-slot:header>
    <x-table :columns="['Id', 'Foto', 'Nama', 'Email', 'Peran']">
        @foreach ($users as $user)
            <tr>
                <x-table-cell>{{ $user->id }}</x-table-cell>
                <x-table-cell>
                    <img src="{{ $user['picture_url'] }}"
                        class="h-12 w-12 bg-white rounded-full border border-gray-400">
                </x-table-cell>
                <x-table-cell>{{ $user->name }}</x-table-cell>
                <x-table-cell>{{ $user->email }}</x-table-cell>
                <x-table-cell>{{ $user->role == 'admin' ? 'Admin' : 'Karyawan' }}</x-table-cell>
                <x-table-cell>
                    <x-button-detail href="/admin/workers/{{ $user->id }}" />
                    @if ($user->role != 'admin')
                        <x-button-update />
                        <x-button-delete />
                    @endif
                </x-table-cell>
            </tr>
        @endforeach
    </x-table>
    <x-slot:footer>{{ $users->links('components.pagination', data: ['scrollTo' => false]) }}</x-slot:footer>
</x-section>
