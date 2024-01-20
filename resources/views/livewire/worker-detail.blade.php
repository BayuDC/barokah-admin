<x-section title="Detail Pekerja">
    <x-form>
        <x-form-group>
            <x-input-info label="Nama" :value="$user->name" />
            <x-input-info label="Email" :value="$user->email" />
        </x-form-group>
        <x-form-divider />
        <x-form-group>
            <x-input-info label="Jenis Kelamin" :value="$user->gender" />
            <x-input-info label="No Telepon" :value="$user->phone" />
            <x-input-info label="Alamat" :value="$user->address" />
        </x-form-group>
    </x-form>
</x-section>
