<x-layout-market>
    <div class="container mx-auto mt-10 px-6 py-4">
        <h2 class="text-3xl font-bold mb-8">Daftar Orderan Anda</h2>

        @if ($orders->isEmpty())
            <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-6 rounded-lg shadow-sm" role="alert">
                <p class="font-bold mb-2">Peringatan</p>
                <p>Anda belum memiliki orderan.</p>
            </div>
        @else
            <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border border-gray-300 px-6 py-4 text-left">No</th>
                            <th class="border border-gray-300 px-6 py-4 text-left">Tanggal Order</th>
                            <th class="border border-gray-300 px-6 py-4 text-left">Status</th>
                            <th class="border border-gray-300 px-6 py-4 text-left">Total Harga</th>
                            <th class="border border-gray-300 px-6 py-4 text-left">Detail Item</th>
                            <th class="border border-gray-300 px-6 py-4 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr class="odd:bg-white even:bg-gray-50">
                                <td class="border border-gray-300 px-6 py-4">{{ $loop->iteration }}</td>
                                <td class="border border-gray-300 px-6 py-4">{{ $order->tanggal_order }}</td>
                                <td class="border border-gray-300 px-6 py-4">
                                    <span class="px-4 py-2 rounded-full text-white text-sm {{ $order->status == 'Pending' ? 'bg-yellow-500' : 'bg-green-500' }}">
                                        {{ $order->status }}
                                    </span>
                                </td>
                                <td class="border border-gray-300 px-6 py-4">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</td>
                                <td class="border border-gray-300 px-6 py-4">
                                    <ul class="list-disc pl-6">
                                        @foreach ($order->orderItems as $item)
                                            <li>{{ $item->barang->nama_barang }} ({{ $item->jumlah }}x) - Rp {{ number_format($item->harga_per_item, 0, ',', '.') }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="border border-gray-300 px-6 py-4">
                                    <a href="{{ route('order.success', $order->id) }}" class="inline-block bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 text-sm">
                                        Lihat Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-layout-market>
