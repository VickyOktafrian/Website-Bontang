<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barang extends Model
{
    /** @use HasFactory<\Database\Factories\BarangFactory> */
    use HasFactory;
    protected $fillable = ['nama','slug','deskripsi','harga','stok','gambar'];


    protected static function boot()
    {
        parent::boot();

        static::updating(function ($model) {
            if ($model->isDirty('gambar') && ($model->getOriginal('gambar') != null)) {
                Storage::disk('public')->delete($model->getOriginal('gambar'));
            }
        });
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
        

    }
}
