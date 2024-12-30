<x-layout-market>
    <div class="container mx-auto my-6 px-4">
        <h1 class="text-2xl font-semibold mb-4">Pesanan Berhasil</h1>

        <div class="bg-white shadow-md rounded-lg p-6">
            <p>Terima kasih, pesanan Anda telah berhasil dibuat!</p>

            <h2 class="text-lg font-semibold mt-4">Detail Pesanan</h2>
            <p><strong>ID Pesanan:</strong> {{ $order->id }}</p>
            <p><strong>Tanggal:</strong> {{ $order->tanggal_order }}</p>
            <p><strong>Total:</strong> Rp {{ number_format($order->total_harga, 0, ',', '.') }}</p>

            <h3 class="text-lg font-semibold mt-4">Item Pesanan</h3>
            <ul>
                @foreach($order->orderItems as $item)
                    <li>{{ $item->barang->name }} - {{ $item->jumlah }} x Rp {{ number_format($item->harga_per_item, 0, ',', '.') }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</x-layout-market>
