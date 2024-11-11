<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    
    protected $table = 'product';

    protected $fillable = [
        'image',
        'nama',
        'link_shopee',
        'link_tokped',
        'link_tiktok',
        'tag_product_id',
    ];


    public function Kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }
    public function tagProduct(): BelongsTo
    {
        return $this->belongsTo(TagProduct::class, 'tag_product_id', 'id');
    }
}
