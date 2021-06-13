<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function parent()
    {
        return $this->belongsTo(Comment::class,'comment_id');
    }
    public function getJalaly()
    {
        return verta($this->created_at)->format('Y/m/d');
    }

    public function status()
    {
        return !! $this->status ? 'فعال':'غیرفعال';
    }
}
