<x-section full title="Daftar Pekerja">
    <x-slot:header>
        <x-search></x-search>
    </x-slot:header>
    <x-table :columns="['Id', 'Nama', 'Email', 'Peran']">
        @foreach ($users as $user)
            <tr>
                <x-table-cell>{{ $user->id }}</x-table-cell>
                <x-table-cell>{{ $user->name }}</x-table-cell>
                <x-table-cell>{{ $user->email }}</x-table-cell>
                <x-table-cell>{{ $user->role == 'admin' ? 'Admin' : 'Karyawan' }}</x-table-cell>
                <x-table-cell>
                    <x-button-detail href="/admin/workers/{{ $user->id }}" />
                </x-table-cell>
            </tr>
        @endforeach
    </x-table>
    <x-slot:footer>{{ $users->links('components.pagination', data: ['scrollTo' => false]) }}</x-slot:footer>
</x-section>
