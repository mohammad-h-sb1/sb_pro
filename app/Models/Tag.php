<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
    public function getJalaly()
    {
        return verta($this->created_at)->format('Y/m/d');
    }
}
