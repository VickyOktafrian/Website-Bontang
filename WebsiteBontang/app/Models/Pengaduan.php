<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengaduan extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','bukti','jenis_laporan','keterangan'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
