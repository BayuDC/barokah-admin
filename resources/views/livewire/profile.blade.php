<x-section title="Data Diri">
    <x-slot:header>
        <a
            href="/admin/password"
            class="bg-purple-500 text-white active:bg-purple-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
            type="button">
            <i class="fas fa-lock"></i> Ganti Kata Sandi
        </a>
    </x-slot:header>
    <x-form>
        <x-form-group>
            <x-input-text label="Nama" model="form.name" />
            <x-input-text label="Email" model="form.email" />
        </x-form-group>
        <x-form-divider />
        <x-form-group>
            <x-input-select label="Jenis Kelamin" model="form.gender">
                <option value="M">Laki-laki</option>
                <option value="F">Perempuan</option>
            </x-input-select>
            <x-input-text label="No Telepon" model="form.phone" />
            <x-input-text label="Alamat" model="form.address" />
        </x-form-group>
        <x-form-divider />
        <x-form-control simple />
    </x-form>
</x-section>
