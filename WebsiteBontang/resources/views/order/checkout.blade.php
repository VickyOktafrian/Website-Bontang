<x-layout-market>
    <div class="container mx-auto my-8 px-6 md:px-12">
        <h1 class="text-4xl font-bold mb-8 text-gray-900">Checkout</h1>

        <div class="bg-white shadow-lg rounded-2xl p-8 md:p-12">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">Detail Pesanan</h2>

            @if($cart)
                <table class="w-full table-auto border-collapse border border-gray-300 rounded-xl overflow-hidden">
                    <thead class="bg-blue-50">
                        <tr>
                            <th class="border-b border-gray-300 px-6 py-4 text-left text-sm font-semibold text-gray-600">Nama Barang</th>
                            <th class="border-b border-gray-300 px-6 py-4 text-left text-sm font-semibold text-gray-600">Jumlah</th>
                            <th class="border-b border-gray-300 px-6 py-4 text-left text-sm font-semibold text-gray-600">Harga</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($cart as $item)
                            <tr class="hover:bg-blue-50">
                                <td class="border-t border-gray-300 px-6 py-4 text-sm text-gray-700">{{ $item['name'] }}</td>
                                <td class="border-t border-gray-300 px-6 py-4 text-sm text-gray-700">{{ $item['quantity'] }}</td>
                                <td class="border-t border-gray-300 px-6 py-4 text-sm text-gray-700">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-6 border-t pt-4">
                    <h3 class="text-lg font-semibold text-gray-800">Total Harga: <span class="text-blue-600">Rp {{ number_format($totalHarga, 0, ',', '.') }}</span></h3>
                </div>

                <form action="{{ route('order.store') }}" method="POST" class="mt-8">
                    @csrf
                    <div class="mb-6">
                        <label for="alamat_pengiriman" class="block text-sm font-medium text-gray-700">Alamat Pengiriman</label>
                        <textarea name="alamat_pengiriman" id="alamat_pengiriman" rows="4" class="form-textarea mt-2 block w-full px-4 py-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" required></textarea>
                    </div>

                    <input type="hidden" name="total_harga" value="{{ $totalHarga }}">

                    <button type="submit" class="w-full py-4 px-6 text-white bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg shadow-lg transform hover:scale-105 hover:bg-gradient-to-r hover:from-blue-600 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all">Proses Pesanan</button>
                </form>
            @else
                <p class="text-center text-gray-600">Keranjang belanja kosong.</p>
            @endif
        </div>
    </div>
</x-layout-market>
