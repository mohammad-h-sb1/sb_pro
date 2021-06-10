<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    const PARTE_HETHEARE='hethere';
    const PARTE_FOOTER='footer';
    const TYPES=[self::PARTE_HETHEARE,self::PARTE_FOOTER];
    use HasFactory;

    protected $guarded=[];

    public function hethaer()
    {
        return $this->type=self::PARTE_HETHEARE;
    }

    public function footer()
    {
        return $this->type=self::PARTE_FOOTER;
    }
}
