<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    protected $table = 'revenue'; // Tên bảng trong CSDL
    protected $primaryKey = 'dayrevenue'; // Tên trường khóa chính
    protected $fillable = ['totalrevenue','ordernumber','orderproduct']; // Các trường trong bảng có thể được gán giá trị
    
    
}