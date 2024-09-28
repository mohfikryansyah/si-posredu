<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MissedPelayanans extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    // public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'id', 'nama', 'entitas_type', 'tanggal_pelayanan', 'judul_pelayanan'
    ];

    public static function boot()
    {
        parent::boot();

        // Generate UUID automatically when creating a new MissedPelayanan
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
