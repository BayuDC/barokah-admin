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
    </x-form-group>
    <div class="mt-2">
        <x-input-text label="Alamat" model="form.address" />
    </div>
    <x-form-divider />
    <x-input-file label="Foto" model="form.picture"
        :preview="$form->picture
            ? ($errors->has('form.picture')
                ? null
                : $form->picture?->temporaryUrl())
            : $form->pictureUrl" />
    <x-form-divider />
    <x-form-control simple />
</x-form>
