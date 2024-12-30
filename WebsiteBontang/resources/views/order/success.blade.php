<x-layout-market>
    <div class="container mx-auto my-8 px-6 md:px-12">
        <h1 class="text-4xl font-bold mb-8 text-gray-900">Pesanan Berhasil</h1>

        <div class="bg-white shadow-xl rounded-2xl p-8 md:p-12">
            <p class="text-lg text-gray-700">Terima kasih, pesanan Anda telah berhasil dibuat!</p>

            <div class="mt-8 border-t pt-6">
                <h2 class="text-2xl font-semibold text-gray-800">Detail Pesanan</h2>
                <div class="mt-4 space-y-3 text-sm text-gray-600">
                    <p><strong>ID Pesanan:</strong> {{ $order->id }}</p>
                    <p><strong>Tanggal:</strong> {{ $order->tanggal_order }}</p>
                    <p><strong>Total:</strong> Rp {{ number_format($order->total_harga, 0, ',', '.') }}</p>
                </div>
            </div>

            <div class="mt-8 border-t pt-6">
                <h3 class="text-xl font-semibold text-gray-800">Item Pesanan</h3>
                <ul class="list-disc pl-6 space-y-4 mt-4">
                    @foreach($order->orderItems as $item)
                        <li class="text-sm text-gray-700">
                            <span class="font-medium text-blue-600">{{ $item->barang->name }}</span> - {{ $item->jumlah }} x 
                            Rp {{ number_format($item->harga_per_item, 0, ',', '.') }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="mt-8 flex justify-center">
                <a href="{{ route('portal-belanja') }}" class="px-6 py-3 text-white bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg shadow-lg hover:from-blue-600 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all">Kembali Lihat Produk</a>
            </div>
        </div>
    </div>
</x-layout-market>
