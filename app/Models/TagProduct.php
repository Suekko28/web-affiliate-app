<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TagProduct extends Model
{
    use HasFactory;

    protected $table = 'tag_product';


    protected $fillable = [
        'tag_product',
    ];

    public function Kategori(): HasMany
    {
        return $this->hasMany(Kategori::class, 'tag_product_id', 'id');
    }
    public function Product(): HasMany
    {
        return $this->hasMany(Product::class, 'tag_product_id', 'id');
    }
}
