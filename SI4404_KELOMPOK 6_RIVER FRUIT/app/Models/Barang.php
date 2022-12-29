<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    //realtion ke cart
    public function cart(){
        return $this->hasMany(Cart::class , 'barang_id' , 'id');
    }

}
