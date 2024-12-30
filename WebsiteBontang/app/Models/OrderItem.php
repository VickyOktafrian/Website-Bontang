<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'barang_id', 'jumlah', 'harga_per_item'];

    /**
     * Relasi OrderItem ke Order
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Relasi OrderItem ke Barang
     */
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}

