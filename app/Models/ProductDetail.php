<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model{
    use HasFactory;

    protected $table = 'product_detail';

    protected $primaryKey = 'id';
    protected $fillable = [
        'product_id',
        'product_quantity',
        'product_image',
        'product_description'
        ];
}
