<x-section full title="Daftar Karyawan" x-data="{ user: null }">
    <x-slot:header>
        <x-search />
        <x-button-create href="/admin/workers/create" />
    </x-slot:header>
    <x-table :columns="['Id', 'Foto', 'Nama', 'Email', 'Peran']">
        @foreach ($users as $user)
            <x-table-row>
                <x-table-cell>{{ $user->id }}</x-table-cell>
                <x-table-cell>
                    <x-photo :url="$user['picture_url']" />
                </x-table-cell>
                <x-table-cell>{{ $user->name }}</x-table-cell>
                <x-table-cell>{{ $user->email }}</x-table-cell>
                <x-table-cell>
                    @if ($user->role == 'admin')
                        <span
                            class="text-xs font-semibold inline-block py-1 px-2 rounded text-purple-600 bg-purple-200 uppercase">
                            Admin
                        </span>
                    @else
                        <span
                            class="text-xs font-semibold inline-block py-1 px-2 rounded text-teal-600 bg-teal-200 uppercase">
                            Karyawan
                        </span>
                    @endif
                </x-table-cell>
                <x-table-cell>
                    <x-button-detail href="/admin/workers/{{ $user->id }}" />
                    <x-button-update href="/admin/workers/update/{{ $user->id }}" />
                    @if ($user->role != 'admin')
                        <x-button-delete
                            x-on:click="user = { id: '{{ $user->id }}', name: '{{ $user->name }}' }" />
                    @endif
                </x-table-cell>
            </x-table-row>
        @endforeach
    </x-table>
    <x-slot:footer>
        <livewire:worker-delete />
        {{ $users->links('components.pagination', data: ['scrollTo' => false]) }}
    </x-slot:footer>
</x-section>
