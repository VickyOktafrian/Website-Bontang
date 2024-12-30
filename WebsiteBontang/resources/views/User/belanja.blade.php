<x-layout-market>
    <div class="flex items-center justify-center min-h-screen">
        <div class="font-sans">
            <div class="p-4 lg:max-w-6xl max-w-2xl max-lg:mx-auto">
                <div class="grid items-start grid-cols-1 lg:grid-cols-2 gap-8 max-lg:gap-16">
                    <div class="w-full lg:sticky top-0 text-center">
                        <div class="lg:h-[560px]">
                            <img src="{{ asset('storage/' . $barang->gambar) }}" alt="{{ $barang->nama }}" class="lg:w-11/12 w-full h-full rounded-md object-cover object-top" />
                        </div>

                        
                    </div>

                    <div>
                        <div class="flex flex-wrap items-start gap-4">
                            <div>
                                <h2 class="text-2xl font-bold text-gray-800">{{ $barang->nama }}</h2>
                               
                            </div>
                        </div>

                        <hr class="my-8" />

                        <div class="flex flex-wrap gap-4 items-start">
                            <div>
                                <p class="text-gray-800 text-4xl font-bold">Rp {{number_format($barang->harga, 0, ',', '.')  }}</p>
                                <p class="text-sm text-gray-500 mt-2">Stok: {{ $barang->stok }}</p>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-4 items-center mt-4">
                            <p class="text-gray-800 text-sm font-medium">Jumlah:</p>
                            <div class="flex items-center gap-2">
                                <button id="decrement" class="w-8 h-8 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-md text-center font-bold">-</button>
                                <input id="quantity" type="number" min="1" max="{{ $barang->stok }}" value="1" class="w-16 border border-gray-300 rounded-md text-center" style="appearance: none;"/>
                                <button id="increment" class="w-8 h-8 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-md text-center font-bold">+</button>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-4 items-center mt-4">
                            <p class="text-gray-800 text-sm font-medium">Total Harga: </p>
                            <p id="total-price" class="text-gray-800 text-lg font-bold">Rp {{ $barang->harga }}</p>
                        </div>

                        <div class="flex flex-wrap gap-4 mt-4">
                            <button type="button" class="min-w-[200px] px-4 py-3 bg-gray-800 hover:bg-gray-900 text-white text-sm font-semibold rounded-md">Beli Sekarang</button>
                            <button type="button" class="min-w-[200px] px-4 py-2.5 border border-gray-800 bg-transparent hover:bg-gray-50 text-gray-800 text-sm font-semibold rounded-md">Masukkan Keranjang</button>
                        </div>
                    </div>
                </div>

                <div class="mt-20 max-w-4xl">
                    <ul class="flex border-b">
                        <li class="text-gray-800 font-semibold text-sm bg-gray-100 py-3 px-8 border-b-2 border-gray-800 cursor-pointer transition-all">
                            Description
                        </li>
                    </ul>

                    <div class="mt-8">
                        <h3 class="text-xl font-bold text-gray-800">Deskripsi Produk</h3>
                        <p class="text-sm text-gray-500 mt-4">{{ $barang->deskripsi }}</p>
                    </div>

                 
                </div>
            </div>
        </div>
    </div>

    <script>
        const pricePerUnit = {{ $barang->harga }};
        const maxStock = {{ $barang->stok }};

        const quantityInput = document.getElementById('quantity');
        const totalPriceElement = document.getElementById('total-price');
        const decrementButton = document.getElementById('decrement');
        const incrementButton = document.getElementById('increment');

        function updateTotalPrice() {
            const quantity = parseInt(quantityInput.value);
            const totalPrice = quantity * pricePerUnit;
            totalPriceElement.textContent = `Rp ${totalPrice}`;
        }

        decrementButton.addEventListener('click', () => {
            let quantity = parseInt(quantityInput.value);
            if (quantity > 1) {
                quantityInput.value = quantity - 1;
                updateTotalPrice();
            }
        });

        incrementButton.addEventListener('click', () => {
            let quantity = parseInt(quantityInput.value);
            if (quantity < maxStock) {
                quantityInput.value = quantity + 1;
                updateTotalPrice();
            }
        });

        quantityInput.addEventListener('input', () => {
            let quantity = parseInt(quantityInput.value);
            if (quantity < 1) {
                quantityInput.value = 1;
            } else if (quantity > maxStock) {
                quantityInput.value = maxStock;
            }
            updateTotalPrice();
        });
    </script>
</x-layout-market>
