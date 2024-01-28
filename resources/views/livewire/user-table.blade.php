<x-section title="Daftar Pelanggan" full>
    <x-slot:header>
        <x-search />
    </x-slot:header>
    <x-table :columns="['Id', 'Foto', 'Nama', 'Email', 'Jenis Kelamin']">
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
                    @switch($user->gender)
                        @case('M')
                            <i class="fas fa-circle text-teal-400 mr-2"></i>
                            Laki-laki
                        @break

                        @case('F')
                            <i class="fas fa-circle text-purple-400 mr-2"></i>
                            Perempuan
                        @break

                        @default
                            <i class="fas fa-circle text-blueGray-400 mr-2"></i>
                            Netral
                    @endswitch
                </x-table-cell>
                <x-table-cell>
                    <x-button-detail href="/admin/users/{{ $user->id }}" />
                </x-table-cell>
            </tr>
        @endforeach
    </x-table>
    <x-slot:footer>{{ $users->links('components.pagination', data: ['scrollTo' => false]) }}</x-slot:footer>
</x-section>
