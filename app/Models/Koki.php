<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Koki extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'jabatan', 'foto', 'instagram', 'facebook', 'x',
    ];

    // Tambahkan metode atau relasi lain yang diperlukan di sini
}
