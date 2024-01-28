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
                    <div class="h-12 w-12 aspect-square overflow-hidden rounded-full border-2 border-indigo-600">
                        <img src="{{ $user['picture_url'] }}"
                            class=" bg-white w-full">
                    </div>
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
            </tr>
        @endforeach
    </x-table>
    <x-slot:footer>
        <livewire:worker-delete />
        {{ $users->links('components.pagination', data: ['scrollTo' => false]) }}
    </x-slot:footer>
</x-section>
