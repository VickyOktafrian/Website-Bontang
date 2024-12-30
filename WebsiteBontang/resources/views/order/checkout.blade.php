<x-layout-market>
    <div class="container mx-auto my-6 px-4">
        <h1 class="text-2xl font-semibold mb-4">Checkout</h1>

        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Detail Pesanan</h2>

            @if($cart)
                <table class="w-full table-auto border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">Nama Barang</th>
                            <th class="border border-gray-300 px-4 py-2">Jumlah</th>
                            <th class="border border-gray-300 px-4 py-2">Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cart as $item)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">{{ $item['name'] }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $item['quantity'] }}</td>
                                <td class="border border-gray-300 px-4 py-2">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-4">
                    <h3 class="text-lg font-semibold">Total Harga: Rp {{ number_format($totalHarga, 0, ',', '.') }}</h3>
                </div>

                <form action="{{ route('order.store') }}" method="POST" class="mt-6">
                    @csrf
                    <div class="mb-4">
                        <label for="alamat_pengiriman" class="block text-sm font-medium text-gray-700">Alamat Pengiriman</label>
                        <textarea name="alamat_pengiriman" id="alamat_pengiriman" rows="4" class="form-input w-full" required></textarea>
                    </div>

                    <input type="hidden" name="total_harga" value="{{ $totalHarga }}">

                    <button type="submit" class="btn btn-primary px-6 py-2 text-white bg-blue-500 rounded shadow hover:bg-blue-600">Proses Pesanan</button>
                </form>
            @else
                <p>Keranjang belanja kosong.</p>
            @endif
        </div>
    </div>
</x-layout-market>
