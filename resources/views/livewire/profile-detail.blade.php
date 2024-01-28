<x-section title="Data Diri">
    <x-slot:header>
        <x-button-update href="/admin/profile/update" />
    </x-slot:header>
    <x-shared.user-info :user="$user" />
</x-section>
