<?php

namespace App\Models;

use App\Models\Lansia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PemeriksaanLansia extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    protected $keyType = 'string';

    public function lansia()
    {
        return $this->belongsTo(Lansia::class, 'lansia_id', 'id');
    }
    
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
}
