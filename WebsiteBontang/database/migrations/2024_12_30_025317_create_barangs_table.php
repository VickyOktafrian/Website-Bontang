<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tabel barangs (Produk)
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('slug')->unique();
            $table->longText('deskripsi');
            $table->decimal('harga', 10, 2); // Menambahkan presisi harga
            $table->integer('stok');
            $table->string('gambar');
            $table->timestamps();
        });

        // Tabel orders (Pesanan)
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi dengan users
            $table->timestamp('tanggal_order')->useCurrent();
            $table->decimal('total_harga', 10, 2);
            $table->enum('status', ['pending', 'paid', 'shipped', 'delivered', 'canceled']);
            $table->text('alamat_pengiriman');
            $table->timestamps();
        });

        // Tabel order_items (Item dalam Pesanan)
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade'); // Relasi dengan orders
            $table->foreignId('barang_id')->constrained('barangs')->onDelete('cascade'); // Relasi dengan barangs
            $table->integer('jumlah');
            $table->decimal('harga_per_item', 10, 2);
            $table->timestamps();
        });

        // Tabel payments (Pembayaran)
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade'); // Relasi dengan orders
            $table->enum('metode_pembayaran', ['credit_card', 'bank_transfer', 'cash_on_delivery']);
            $table->decimal('jumlah_bayar', 10, 2);
            $table->timestamp('tanggal_pembayaran')->useCurrent();
            $table->enum('status_pembayaran', ['pending', 'paid', 'failed']);
            $table->timestamps();
        });
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi dengan tabel users
            $table->foreignId('barang_id')->constrained('barangs')->onDelete('cascade'); // Relasi dengan tabel barangs
            $table->integer('quantity')->default(1); // Jumlah produk dalam keranjang
            $table->timestamps();
        });
        

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
   
        Schema::dropIfExists('payments');
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('barangs');
        Schema::dropIfExists('carts');
    }
};
