<div class="w-full mb-6 px-4">
    <div>
        <div class="relative flex flex-col min-w-0 break-words w-full shadow-lg rounded bg-white">
            <div class="rounded-t mb-0 px-4 py-3 border-0">
                <div class="flex flex-col md:flex-row flex-wrap items-center gap-4">
                    <h3 class="font-semibold text-xl text-blueGray-700 w-full lg:w-auto lg:mr-auto">
                        Edit Produk
                    </h3>
                </div>
            </div>
            <div class="block w-full overflow-x-auto mb-auto bg-blueGray-100">

                <div class="flex-auto px-4 lg:px-10 py-10">
                    <form wire:submit="save">
                        <div class="grid lg:grid-cols-2 gap-x-4 gap-y-2">
                            <x-input-text label="Nama" model="name" />
                            <x-input-text label="Harga" model="price" />
                            <x-input-text label="Satuan" model="unit" />
                        </div>

                        <hr class="my-6 border-b-1 border-blueGray-300" />

                        <div class="flex justify-end gap-2">
                            <a href="/admin/products"
                                class="bg-blueGray-500 text-white active:bg-blueGray-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                <i class="fas fa-times"></i> Batal
                            </a>
                            <button
                                class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                type="submit">
                                <i class="fas fa-check"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>