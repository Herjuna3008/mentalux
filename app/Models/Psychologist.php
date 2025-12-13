<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psychologist extends Model
{
    use HasFactory;

    // Kasih tau Laravel nama tabelnya (Jaga-jaga biar gak nyasar)
    protected $table = 'psychologists';

    // Kolom mana aja yang boleh diisi (PENTING biar gak error "Mass Assignment")
    protected $fillable = [
        'name',
        'role',
        'specialist',
        'image',
        'desc',
        'session',
        'price',
    ];
}