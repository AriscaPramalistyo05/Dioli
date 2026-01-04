<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Blog extends Model
{
    protected $fillable = ['title', 'content', 'date'];

    // Atau jika tidak ingin menggunakan $dates, buat accessor sebagai berikut:
    public function getDateAttribute($value)
    {
        return Carbon::parse($value);
    }
}
