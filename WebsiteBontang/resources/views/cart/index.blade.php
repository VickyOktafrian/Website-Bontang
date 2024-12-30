<x-layout-market>
    <div class="container mx-auto my-6 px-4">
        <h1 class="text-3xl font-semibold mb-6 text-gray-800">Keranjang Belanja</h1>

        @if(session()->has('cart') && count(session('cart')) > 0)
            <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Gambar</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Nama</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Harga</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Jumlah</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(session('cart') as $id => $details)
                            <tr class="border-b hover:bg-gray-50 transition-all">
                                <td class="px-6 py-4">
                                    <img src="{{ $details['image'] }}" alt="{{ $details['name'] }}" class="w-16 h-16 object-cover rounded-lg">
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $details['name'] }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">Rp {{ number_format($details['price'], 0, ',', '.') }}</td>
                                <td class="px-6 py-4 text-sm">
                                    <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1" class="form-input w-20 text-center mr-2 bg-gray-50 border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-400 quantity-input" data-id="{{ $id }}" onchange="updateTotal()">
                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('cart.remove', $id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="text-red-500 hover:text-red-700 text-sm font-medium focus:outline-none">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6 flex justify-between items-center">
                <h3 class="text-xl font-semibold text-gray-800">Total: <span id="total-price" class="font-bold">Rp {{ number_format(array_sum(array_map(function($item) {
                    return $item['price'] * $item['quantity'];
                }, session('cart'))), 0, ',', '.') }}</span></h3>

                <!-- Clear Cart Form -->
                <form action="{{ route('cart.clear') }}" method="POST" class="ml-4">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-red-400">Kosongkan Keranjang</button>
                </form>
            </div>

            <!-- Checkout Button -->
            <div class="mt-8 text-center">
                <form action="{{ route('order.checkout') }}" method="GET">
                    <button type="submit" class="px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white text-lg font-semibold rounded-md shadow-lg transition-all focus:outline-none focus:ring-2 focus:ring-blue-500">Checkout</button>
                </form>
            </div>
        @else
            <p class="text-lg text-gray-600">Keranjang Anda kosong.</p>
        @endif

        <!-- Back Button to specific route -->
        <div class="mt-6 text-center">
            <a href="{{ route('portal-belanja') }}" class="px-8 py-3 bg-gray-600 hover:bg-gray-700 text-white text-lg font-semibold rounded-md shadow-lg transition-all focus:outline-none focus:ring-2 focus:ring-gray-500">Kembali</a>
        </div>
    </div>

    <script>
        function updateTotal() {
            let total = 0;
            const cartItems = document.querySelectorAll('.quantity-input');
            cartItems.forEach(item => {
                const price = parseInt(item.closest('tr').querySelector('td:nth-child(3)').innerText.replace('Rp ', '').replace('.', '').trim());
                const quantity = parseInt(item.value);
                total += price * quantity;
            });

            // Update the total price display with formatted currency
            document.getElementById('total-price').innerText = 'Rp ' + total.toLocaleString();
        }
    </script>
</x-layout-market>