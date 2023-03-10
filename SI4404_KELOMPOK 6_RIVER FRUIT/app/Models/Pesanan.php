<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';
    //relation ke user
    public function user(){
        return $this->belongsTo(User::class , 'user_id', 'id');
    }
    //relation ke order
    public function order(){
        return $this->hasMany(Order::class, 'pesanan_id', 'id');
    }
}
