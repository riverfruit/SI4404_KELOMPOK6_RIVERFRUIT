<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';

    public function user(){
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }

    public function barang(){
        return $this->belongsTo(Barang::class, 'barang_id', 'id');
    }
}
