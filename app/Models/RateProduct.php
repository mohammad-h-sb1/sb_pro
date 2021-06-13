<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RateProduct extends Model
{
    use HasFactory;

    //ابن مودل برای ارزش جنس هست

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
