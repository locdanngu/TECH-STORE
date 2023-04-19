<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart'; // Tên bảng trong CSDL
    protected $primaryKey = ['idproduct' , 'id']; // Tên trường khóa chính
    protected $fillable = ['quatifier']; // Các trường trong bảng có thể được gán giá trị

    
}
