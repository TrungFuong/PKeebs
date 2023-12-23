<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = "orders";

    public function status(){
        return $this->belongsTo(Status::class, 'status_id');
    }
//    protected $fillable = ['product_id', 'user_id', 'status_id'];

}

