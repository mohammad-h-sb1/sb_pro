<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product_imges()
    {
        return $this->hasMany(Product_img::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function reates()
    {
        return $this->hasMany(Reate::class);
    }

    public function likes()
    {
        return $this->belongsTo(User::class,'likes');
    }

    public function getIsUserLikedAttribute()
    {
        return $this->likes()->where('user_id',auth()->user()->id)->exists();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function getJalaly()
    {
        return verta($this->created_at)->format('Y/m/d');
    }

    public function Discounts()
    {
        return $this->hasOne(Discount::class);
    }

    public function SoldProduct()
    {
        return $this->belongsTo(SoldProduct::class);
    }

    public function depot()
    {
        $this->hasOne(Product::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
