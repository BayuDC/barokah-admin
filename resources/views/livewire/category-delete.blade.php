<div x-data="{
    get open() { return this.selected != null },
    confirm() { $wire.delete(this.selected.id) },
    cancel() { this.selected = null },
}">
    <x-modal>
        Apakah anda yakin akan menghapus kategori <b x-text="selected?.name"></b>?
    </x-modal>
</div>
