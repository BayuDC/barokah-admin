<x-section title="Detail Karyawan" x-data="{ user: null }">
    <x-slot:header>
        <div>
            <x-button-update href="/admin/workers/update/{{ $user->id }}" />
            @if ($user->role != 'admin')
                <x-button-delete
                    x-on:click="user = { id: {{ $user->id }}, name: '{{ $user->name }}' }" />
            @endif
        </div>
    </x-slot:header>
    <x-shared.user-info :user="$user" />
    <x-slot:footer>
        @if ($user->role != 'admin')
            <livewire:worker-delete />
        @endif
    </x-slot:footer>
</x-section>
