<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $fillable  = [
        'kategori',
        'tag_product_id'
    ];

    public function tagProduct() :BelongsTo
    {
        return $this->belongsTo(TagProduct::class, 'tag_product_id', 'id');
    }

    public function Product(): HasMany
    {
        return $this->hasMany(Product::class, 'kategori_id', 'id');
    }

}
