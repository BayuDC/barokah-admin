<x-section title="Edit Produk">
    <x-form>
        <x-form-group>
            <x-input-text label="Nama" model="name" />
            <x-input-text label="Harga" model="price" />
            <x-input-text label="Satuan" model="unit" />
        </x-form-group>
        <x-form-divider />
        <x-input-file label="Gambar" model="picture" :preview="$picture ? ($errors->has('picture') ? null : $picture?->temporaryUrl()) : $pictureUrl" />
        <x-form-divider />
        <x-form-control />
    </x-form>
</x-section>
