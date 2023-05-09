<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notification'; // Tên bảng trong CSDL
    protected $primaryKey = 'idnotification'; // Tên trường khóa chính
    protected $fillable = ['id','notification','nameproduct','image','status']; // Các trường trong bảng có thể được gán giá trị
    public $timestamps = true;
    
    // Định nghĩa quan hệ một-nhiều (one-to-many) với mô hình (model) Product
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }


    
}