<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Remaja extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    // public $incrementing = false;
    protected $keyType = 'string';

    public function pemeriksaanRemaja()
    {
        return $this->hasMany(PemeriksaanRemaja::class, 'remaja_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
