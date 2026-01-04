<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'date',
        'time',
        'note',
    ];

    // Relasi ke User (opsional, jika Anda ingin menyimpan user_id)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
