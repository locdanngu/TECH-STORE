<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product'; // Tên bảng trong CSDL
    protected $primaryKey = 'idproduct'; // Tên trường khóa chính
    protected $fillable = ['nameproduct', 'price','inventoryquantity' , 'idcategory','image','review']; // Các trường trong bảng có thể được gán giá trị
    // Các phương thức thực hiện các tác vụ liên quan đến dữ liệu trong bảng

    // Định nghĩa quan hệ many-to-one với bảng Category
    public function category()
    {
        return $this->belongsTo(Category::class, 'idcategory');
    }

    public function cart()
    {
        return $this->hasMany(Cart::class, 'idproduct');
    }

}
