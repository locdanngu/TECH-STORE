<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';
    protected $primaryKey = ['idcart'];
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['idproduct', 'id','quatifier', 'status'];
    public $timestamps = true;

    public function product()
    {
        return $this->belongsTo(Product::class, 'idproduct');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
