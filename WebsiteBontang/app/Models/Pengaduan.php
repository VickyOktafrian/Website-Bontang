<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengaduan extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','bukti','jenis_laporan','keterangan'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected static function boot()
    {
        parent::boot();

        static::updating(function ($model) {
            if ($model->isDirty('bukti') && ($model->getOriginal('bukti') != null)) {
                Storage::disk('public')->delete($model->getOriginal('bukti'));
            }
        });
    }
}
