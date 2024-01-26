<div class="flex justify-end gap-2">
    @if (!isset($simple))
        <button x-on:click="() => history.back()" type="button"
            class="bg-blueGray-500 text-white active:bg-blueGray-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
            <i class="fas fa-times"></i> Batal
        </button>
    @endif
    <button
        class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
        type="submit">
        <i class="fas fa-check"></i> Simpan
    </button>
</div>
