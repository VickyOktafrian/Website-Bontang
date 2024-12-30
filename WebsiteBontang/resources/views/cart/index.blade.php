<x-layout-market>
    <div class="container mx-auto my-6 px-4">
        <h1 class="text-2xl font-semibold mb-4">Keranjang Belanja</h1>

        @if(session()->has('cart') && count(session('cart')) > 0)
            <div class="overflow-x-auto bg-white shadow-md rounded-lg">
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
                            <tr class="border-b hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <img src="{{ $details['image'] }}" alt="{{ $details['name'] }}" class="w-20 h-20 object-cover rounded">
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-800">{{ $details['name'] }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">Rp {{ number_format($details['price'], 0, ',', '.') }}</td>
                                <td class="px-6 py-4 text-sm">
                                    <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1" class="form-input w-16 text-center mr-2 quantity-input" data-id="{{ $id }}" onchange="updateTotal()">
                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('cart.remove', $id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4 text-right">
                <h3 class="text-xl font-semibold">Total: <span id="total-price">Rp {{ number_format(array_sum(array_map(function($item) {
                    return $item['price'] * $item['quantity'];
                }, session('cart'))), 0, ',', '.') }}</span></h3>

                <!-- Clear Cart Form -->
                <form action="{{ route('cart.clear') }}" method="POST" class="mt-2">
                    @csrf
                    <button type="submit" class="btn btn-danger">Kosongkan Keranjang</button>
                </form>
            </div>

            <!-- Checkout Button -->
            <div class="mt-6 text-center">
                <form action="{{ route('order.checkout') }}" method="GET">
                    <button type="submit" class="btn btn-primary px-6 py-2 text-white bg-blue-500 rounded shadow hover:bg-blue-600">Checkout</button>
                </form>
            </div>
        @else
            <p class="text-lg text-gray-600">Keranjang Anda kosong.</p>
        @endif
    </div>

    <script>
        function updateTotal() {
            let total = 0;
            const cartItems = document.querySelectorAll('.quantity-input');
            cartItems.forEach(item => {
                const price = parseInt(item.closest('tr').querySelector('td:nth-child(3)').innerText.replace('Rp ', '').replace('.', ''));
                const quantity = parseInt(item.value);
                total += price * quantity;
            });

            document.getElementById('total-price').innerText = `Rp ${total.toLocaleString()}`;
        }
    </script>
</x-layout-market>
