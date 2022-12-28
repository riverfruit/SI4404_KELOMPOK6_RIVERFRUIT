<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class HomesController extends Controller
{
    public function index(){
        return view('homes');
    }

    public function home(){
        $data = Barang::all();
        return view('user.shop' , ['data' => $data]);
    }
    public function search(Request $request){
        $barang = Barang::where('name','LIKE','%'.$request->search.'%')->get();
        return view('user.shop' , ['data' => $barang]);
    }


}
