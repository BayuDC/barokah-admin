<div x-data="{
    get open() { return this.{{ $key }} != null },
    confirm() { $wire.attempt(this.{{ $key }}.id) },
    cancel() { this.{{ $key }} = null },
}">
    <x-modal>
        Apakah anda yakin akan menghapus {{ $label }} <b x-text="{{ $key }}?.name"></b>?
    </x-modal>
</div>
