<div>
    <x-section title="Profil">
        <x-slot:header>
            <a
                href="/admin/profile/password"
                class="bg-purple-500 text-white active:bg-purple-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                type="button">
                <i class="fas fa-lock"></i> Ganti Kata Sandi
            </a>
        </x-slot:header>
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
            <x-form-divider />
            <x-form-control simple />
        </x-form>
    </x-section>
</div>
