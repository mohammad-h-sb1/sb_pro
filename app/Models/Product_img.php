<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_img extends Model
{
    use HasFactory;

    public function protrct()
    {
        return $this->belongsTo(Product::class);
    }
    public function getJalaly()
    {
        return verta($this->created_at)->format('Y/m/d');
    }
}
