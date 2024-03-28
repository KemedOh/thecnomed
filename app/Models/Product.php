<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'qty',
        'selling_price',
        'buying_price',
        'product_type_id',
        'status',
    ];
    public function product_type()
    {
        return $this->belongsTo(Product_Type::class, 'product_type_id');
    }

}
