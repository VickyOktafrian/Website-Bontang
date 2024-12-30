<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'metode_pembayaran', 'jumlah_bayar', 'tanggal_pembayaran', 'status_pembayaran'];

    /**
     * Relasi Payment ke Order
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
