<?php

namespace App\Models;

use App\Models\User;
use App\Models\PemeriksaanIbu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ibu extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    // public $incrementing = false;
    protected $keyType = 'string';

    public function pemeriksaanIbu()
    {
        return $this->hasMany(PemeriksaanIbu::class, 'ibu_id', 'id');
    }
    
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
