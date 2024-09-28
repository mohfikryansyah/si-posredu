<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'tipe_entitas',
        'anak_id',
        'remaja_id',
        'lansia_id',
        'ibu_id',
        'employee_id',
        'fotoProfile',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // public function role(): BelongsTo
    // {
    //     return $this->belongsTo(Role::class);
    // }

    public function anak()
    {
        return $this->belongsTo(Anak::class, 'anak_id');
    }

    public function remaja()
    {
        return $this->belongsTo(Remaja::class, 'remaja_id');
    }

    public function lansia()
    {
        return $this->belongsTo(Lansia::class, 'lansia_id');
    }

    public function ibu()
    {
        return $this->belongsTo(Ibu::class, 'ibu_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
    
}
