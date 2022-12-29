<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct(){

    }

    public function index(Request $request)
    {
        $cart = Cart::where('user_id', Auth::user()->id)->get();
        $total = Cart::where('user_id', Auth::user()->id)->count();

        return view('cart.index', compact('cart', 'total'));
    }

    public function store(Request $request , $id){
        $data = new Cart;
        $data->user_id = Auth::user()->id;
        $data->barang_id = $id;
        $data->total = $request->total;
        $data->save();

        return redirect()->back();
    }

    public function update(Request $request , $id){
        $data = Cart::find($id);
        $data->total = $request->total;
        $data->update();

        return redirect()->back();
    }

    public function destroy($id){
        $data = Cart::find($id);
        $data->delete();

        return redirect()->back();
    }
}
