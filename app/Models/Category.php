<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category'; // Tên bảng trong CSDL
    protected $primaryKey = 'idcategory'; // Tên trường khóa chính
    protected $fillable = ['namecategory','iconcategory']; // Các trường trong bảng có thể được gán giá trị
    
    // Định nghĩa quan hệ một-nhiều (one-to-many) với mô hình (model) Product
    public function products()
    {
        return $this->hasMany(Product::class, 'idcategory', 'idcategory');
    }


    // // Lấy tất cả sản phẩm và thông tin về danh mục của sản phẩm
    // $products = Product::with('category')->get();

    // // Lấy thông tin về danh mục của một sản phẩm cụ thể
    // $product = Product::find(1);
    // $category = $product->category;
}