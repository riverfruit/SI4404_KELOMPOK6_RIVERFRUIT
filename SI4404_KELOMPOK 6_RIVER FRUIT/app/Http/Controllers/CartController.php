<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct(){

    }

    //fungsi liat index barnag
    public function index(Request $request)
    {
        $cart = Cart::where('user_id', Auth::user()->id)->get();
        $total = Cart::where('user_id', Auth::user()->id)->count();

        return view('cart.index', compact('cart', 'total'));
    }
    //fungsi buat post pesanan
    public function store(Request $request , $id){
        $data = new Cart;
        $data->user_id = Auth::user()->id;
        $data->barang_id = $id;
        $data->total = $request->total;
        $data->save();

        return redirect()->back();
    }
    //fungsi buat edit cart
    public function update(Request $request , $id){
        $data = Cart::find($id);
        $data->total = $request->total;
        $data->update();

        return redirect()->back();
    }
    //fungsi delete barang di cart
    public function destroy($id){
        $data = Cart::find($id);
        $data->delete();

        return redirect()->back();
    }
}
