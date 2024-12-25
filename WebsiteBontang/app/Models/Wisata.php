<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wisata extends Model
{
    use HasFactory;
    protected $fillable = ['judul','slug','thumbnail','isi'];
    protected static function boot()
    {
        parent::boot();

        static::updating(function ($model) {
            if ($model->isDirty('thumbnail') && ($model->getOriginal('thumbnail') != null)) {
                Storage::disk('public')->delete($model->getOriginal('thumbnail'));
            }
        });
    }
}
