<x-section title="Daftar Transaksi" x-data="{ id: null }" full>
    <x-slot:header>
        <x-filter model="filter.status">
            <option value="">Semua</option>
            <option value="created">Dibuat</option>
            <option value="confirmed">Dikirim</option>
            <option value="finished">Selesai</option>
            <option value="canceled">Gagal</option>
        </x-filter>
    </x-slot:header>

    <x-table :columns="['Id', 'Pembeli', 'Produk', 'Total Harga', 'Status']">
        @foreach ($transactions as $transaction)
            <x-table-row>
                <x-table-cell>{{ $transaction->id }}</x-table-cell>
                <x-table-cell>{{ $transaction->customer->name }}</x-table-cell>
                <x-table-cell>
                    @foreach ($transaction->products as $i => $product)
                        {{ $product->name }}
                    @endforeach
                    @if ($transaction->products_count > 1)
                        dan {{ $transaction->products_count - 1 }} produk lainnya
                    @endif
                </x-table-cell>
                <x-table-cell>Rp{{ $transaction['final_price'] }}</x-table-cell>
                <x-table-cell>
                    @switch($transaction->status)
                        @case('created')
                            <span
                                class="text-xs font-semibold inline-block py-1 px-2 rounded text-blueGray-600 bg-blueGray-200 uppercase">
                                Dibuat
                            </span>
                        @break

                        @case('confirmed')
                            <span
                                class="text-xs font-semibold inline-block py-1 px-2 rounded text-lightBlue-600 bg-lightBlue-200 uppercase">
                                Dikirim
                            </span>
                        @break

                        @case('finished')
                            <span
                                class="text-xs font-semibold inline-block py-1 px-2 rounded text-emerald-600 bg-emerald-200 uppercase">
                                Selesai
                            </span>
                        @break

                        @case('canceled')
                            <span
                                class="text-xs font-semibold inline-block py-1 px-2 rounded text-red-600 bg-red-200 uppercase">
                                Gagal
                            </span>
                        @break

                        @default
                    @endswitch

                </x-table-cell>
                <x-table-cell>
                    <x-button-detail x-on:click="id = {{ $transaction->id }}" />
                </x-table-cell>
            </x-table-row>
        @endforeach
    </x-table>
    <x-slot:footer>
        <livewire:transaction-detail />
        {{ $transactions->links('components.pagination', data: ['scrollTo' => false]) }}
    </x-slot:footer>
</x-section>
