<x-layout-market>
    <div class="flex items-center justify-center min-h-screen">
        <div class="font-sans">
            <div class="p-4 lg:max-w-6xl max-w-2xl max-lg:mx-auto">
                <div class="grid items-start grid-cols-1 lg:grid-cols-2 gap-8 max-lg:gap-16">
                    <div class="w-full lg:sticky top-0 text-center">
                        <div class="lg:h-[560px]">
                            <img src="https://readymadeui.com/images/product6.webp" alt="Product" class="lg:w-11/12 w-full h-full rounded-md object-cover object-top" />
                        </div>

                        <div class="flex flex-wrap gap-4 justify-center mx-auto mt-4">
                            <img src="https://readymadeui.com/images/product6.webp" alt="Product1" class="w-16 cursor-pointer rounded-md outline" />
                            <img src="https://readymadeui.com/images/product8.webp" alt="Product2" class="w-16 cursor-pointer rounded-md" />
                            <img src="https://readymadeui.com/images/product5.webp" alt="Product3" class="w-16 cursor-pointer rounded-md" />
                            <img src="https://readymadeui.com/images/product7.webp" alt="Product4" class="w-16 cursor-pointer rounded-md" />
                        </div>
                    </div>

                    <div>
                        <div class="flex flex-wrap items-start gap-4">
                            <div>
                                <h2 class="text-2xl font-bold text-gray-800">Adjective Attire | T-shirt</h2>
                                <p class="text-sm text-gray-500 mt-2">Well-Versed Commerce</p>
                            </div>
                        </div>

                        <hr class="my-8" />

                        <div class="flex flex-wrap gap-4 items-start">
                            <div>
                                <p class="text-gray-800 text-4xl font-bold">$30</p>
                                <p class="text-sm text-gray-500 mt-2">Stok: 20</p>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-4 items-center mt-4">
                            <p class="text-gray-800 text-sm font-medium">Jumlah:</p>
                            <div class="flex items-center gap-2">
                                <button id="decrement" class="w-8 h-8 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-md text-center font-bold">-</button>
                                <input id="quantity" type="number" min="1" max="20" value="1" class="w-16 border border-gray-300 rounded-md text-center" style="appearance: none;"/>
                                <button id="increment" class="w-8 h-8 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-md text-center font-bold">+</button>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-4 items-center mt-4">
                            <p class="text-gray-800 text-sm font-medium">Total Harga: </p>
                            <p id="total-price" class="text-gray-800 text-lg font-bold">$30</p>
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
                        <h3 class="text-xl font-bold text-gray-800">Product Description</h3>
                        <p class="text-sm text-gray-500 mt-4">Elevate your casual style with our premium men's t-shirt. Crafted for comfort and designed with a modern fit, this versatile shirt is an essential addition to your wardrobe. The soft and breathable fabric ensures all-day comfort, making it perfect for everyday wear. Its classic crew neck and short sleeves offer a timeless look.</p>
                    </div>

                    <ul class="space-y-3 list-disc mt-6 pl-4 text-sm text-gray-500">
                        <li>A gray t-shirt is a wardrobe essential because it is so versatile.</li>
                        <li>Available in a wide range of sizes, from extra small to extra large, and even in tall and petite sizes.</li>
                        <li>This is easy to care for. They can usually be machine-washed and dried on low heat.</li>
                        <li>You can add your own designs, paintings, or embroidery to make it your own.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        const pricePerUnit = 30;
        const maxStock = 20;

        const quantityInput = document.getElementById('quantity');
        const totalPriceElement = document.getElementById('total-price');
        const decrementButton = document.getElementById('decrement');
        const incrementButton = document.getElementById('increment');

        function updateTotalPrice() {
            const quantity = parseInt(quantityInput.value);
            const totalPrice = quantity * pricePerUnit;
            totalPriceElement.textContent = `$${totalPrice}`;
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
