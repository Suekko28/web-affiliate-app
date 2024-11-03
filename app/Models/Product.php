<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    Use HasFactory;

    protected $table = 'product';

    protected $fillabe = [ 
        'image',
        'nama',
        'link_shopee',
        'link_tokped',
        'link_tiktok',
        'kategori',
    ];

    public function Kategori() : BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'product_id', 'id');
    }
}
