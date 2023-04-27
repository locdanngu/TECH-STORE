<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages'; // Tên bảng trong CSDL
    protected $primaryKey = 'idmess'; // Tên trường khóa chính
    protected $fillable = ['sender_id','receiver_id','message','read']; // Các trường trong bảng có thể được gán giá trị

    
}
