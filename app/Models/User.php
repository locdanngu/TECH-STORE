<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    protected $table = 'user'; // Tên bảng trong CSDL
    protected $primaryKey = 'iduser'; // Tên trường khóa chính
    protected $fillable = ['username', 'phone' , 'email', 'password','avatar']; // Các trường trong bảng có thể được gán giá trị
    // Các phương thức thực hiện các tác vụ liên quan đến dữ liệu trong bảng

    
}