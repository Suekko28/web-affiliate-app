<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $fillabe = [
        'kategori'
    ];

    public function Product(): HasMany
    {
        return $this->HasMany(Product::class, 'product_id', 'id');
    }

}
