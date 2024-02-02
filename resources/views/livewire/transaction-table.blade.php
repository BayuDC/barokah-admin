<x-section title="Daftar Transaksi" x-data="{ id: null }" full>
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
                <x-table-cell>{{ $transaction->status }}</x-table-cell>
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
