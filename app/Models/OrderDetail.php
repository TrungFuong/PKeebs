<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "orders_detail";

    public function product(){
        return $this->belongsTo(Status::class, 'product_id');
    }

    public function status(){
        return $this->belongsTo(Status::class, 'orders_id');
    }
//    protected $fillable = ['orders_id', 'product_id'];

}
