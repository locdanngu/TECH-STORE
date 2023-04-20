<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';
    protected $primaryKey = ['idproduct', 'id'];
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['quatifier'];
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
