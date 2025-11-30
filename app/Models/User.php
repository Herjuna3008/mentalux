<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    // ==========================================
    // INI SOLUSINYA (Override Nama Tabel)
    // ==========================================
    protected $table = 'account'; 
    // ==========================================

    // MATIKAN TIMESTAMP (Kalau di tabel account gak ada created_at/updated_at)
    public $timestamps = false; 

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'username', // Sesuaikan nama kolom di tabel lu (misal: 'username' atau 'name')
        'email',
        'password',
        'role',     // Jangan lupa masukin 'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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
}