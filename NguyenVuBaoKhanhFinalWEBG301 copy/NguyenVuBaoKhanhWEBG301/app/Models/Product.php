<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    //nếu em bỏ dòng code timestamps đi thì mặc định sẽ là true lấy
    //dữ liệu thời gian thực rất dễ bị lỗi
    public $timestamps = false;

}
