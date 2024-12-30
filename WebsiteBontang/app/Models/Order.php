<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'tanggal_order', 'total_harga', 'status', 'alamat_pengiriman'];

    /**
     * Relasi Order ke User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi Order ke OrderItems
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Relasi Order ke Payment
     */
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}

