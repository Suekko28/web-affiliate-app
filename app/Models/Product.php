<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    protected $casts = [
        'image' => 'array',
    ];


    protected $table = 'product';

    protected $fillable = [
        'image',
        'nama',
        'link_shopee',
        'link_tokped',
        'link_tiktok',
        'kategori',
    ];


    public function Kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'product_id', 'id');
    }
}
