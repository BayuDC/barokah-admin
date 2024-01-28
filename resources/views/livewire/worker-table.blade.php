<x-section full title="Daftar Karyawan" x-data="{ user: null }">
    <x-slot:header>
        <x-search />
        <x-button-create href="/admin/workers/create" />
    </x-slot:header>
    <x-table :columns="['Id', 'Foto', 'Nama', 'Email', 'Peran']">
        @foreach ($users as $user)
            <tr>
                <x-table-cell>{{ $user->id }}</x-table-cell>
                <x-table-cell>
                    <div class="h-12 w-12 aspect-square">
                        <img src="{{ $user['picture_url'] }}"
                            class=" bg-white rounded-full border border-gray-400">
                    </div>
                </x-table-cell>
                <x-table-cell>{{ $user->name }}</x-table-cell>
                <x-table-cell>{{ $user->email }}</x-table-cell>
                <x-table-cell>{{ $user->role == 'admin' ? 'Admin' : 'Karyawan' }}</x-table-cell>
                <x-table-cell>
                    <x-button-detail href="/admin/workers/{{ $user->id }}" />
                    <x-button-update href="/admin/workers/update/{{ $user->id }}" />
                    @if ($user->role != 'admin')
                        <x-button-delete
                            x-on:click="user = { id: '{{ $user->id }}', name: '{{ $user->name }}' }" />
                    @endif
                </x-table-cell>
            </tr>
        @endforeach
    </x-table>
    <x-slot:footer>
        <livewire:worker-delete />
        {{ $users->links('components.pagination', data: ['scrollTo' => false]) }}
    </x-slot:footer>
</x-section>
