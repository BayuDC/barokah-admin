<div
    x-data="{
        get open() { return this.id != null }
    }"
    x-init="$watch('id', id => $wire.load(id))">
    <div
        class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
        x-bind:class="{ 'hidden': !open, 'flex': open }"
        id="regular-modal-id">
        <div class="relative my-6 mx-auto max-w-xl md:min-w-sm w-full ">
            <!--content-->
            <div
                class="border-0 max-h-screen overflow-y-auto rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                <!--header-->
                <div class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
                    <h3 class="text-2xl font-semibold">
                        Detail Transaksi
                    </h3>
                </div>
                <!--body-->
                <div class="relative flex-auto bg-blueGray-100 px-5 py-5">
                    <div class="mb-3">
                        <label class="uppercase text-blueGray-600 text-xs font-bold">
                            Status :
                        </label><span
                            class="text-xs font-semibold inline-block py-1 px-2 rounded text-emerald-600 bg-emerald-200 uppercase last:mr-0 mr-1">
                            {{ $transaction?->status }}
                        </span>
                    </div>
                    <x-form-group>
                        <x-input-info label="Pembeli" wire:model="customer" />
                        <x-input-info label="Total Harga" wire:model="price" />
                    </x-form-group>
                    <x-input-info label="Alamat" wire:model="address" />
                    <div>
                        <label class="uppercase text-blueGray-600 text-xs font-bold">
                            Pesanan
                        </label>

                        <div class="md:max-h-64 max-h-32 overflow-y-auto">
                            <table class="w-full ">
                                @foreach ($transaction?->products ?? [] as $product)
                                    <tr class="w-full">
                                        <th
                                            class="border-t-0 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-2 text-left">
                                            {{ $product->name }}/{{ $product->unit }}
                                        </th>
                                        <td
                                            class="border-t-0 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-2">
                                            x{{ $product->pivot->quantity }}
                                        </td>
                                        <th
                                            class="w-full border-t-0 align-middle border-l-0 border-r-0 text-sm whitespace-nowrap p-2 text-right">
                                            Rp{{ $product->pivot->quantity * $product->price }}
                                        </th>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <!--footer-->
                <div class="flex items-center justify-end p-6 border-t border-solid border-blueGray-200 rounded-b">
                    <button
                        x-on:click="id = null"
                        class="mr-auto bg-blueGray-500 text-white active:bg-blueGray-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none ease-linear transition-all duration-150"
                        type="button">
                        Tutup
                    </button>
                    <button
                        class="bg-lightBlue-500 text-white active:bg-lightBlue-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none ease-linear transition-all duration-150"
                        type="button">
                        Kirim Pesanan
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black"
        x-bind:class="{ 'hidden': !open, 'flex': open }" id="regular-modal-id-backdrop"></div>
</div>
