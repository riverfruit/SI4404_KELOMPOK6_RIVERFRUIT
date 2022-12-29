<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function create(Request $request , $total){

        $pes = new Pesanan();
        $pes->user_id = auth()->user()->id;
        $pes->alamat = $request->alamat;
        $pes->status = 'telah di transfer';
        $pes->total = $total;
        if ($request->bukti_trf != null){
            //        upload file
            $file = $request->file('bukti_trf');

            $nama_file = time()."_".$file->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'bukti_trf';
            $file->move($tujuan_upload,$nama_file);

            $pes->bukti_trf = $nama_file;
        }
        $pes->save();

        $pesanan = Auth::user()->pesanan;
        foreach ($pesanan as $p) {
            $data = new Order();
            $data->pesanan_id = $pes->id;
            $data->barang_id = $p->barang_id;
            $data->total = $p->total;
            $data->save();

            $barang = Barang::find($p->barang_id);
            $barang->stock = $barang->stock - $p->total;
            $barang->update();

            $pesanan = Cart::find($p->id);
            $pesanan->delete();

        }




        return redirect()->back();
    }

    public function index(){
        $data = Pesanan::where('user_id',Auth::user()->id)->get();

        return view('order.index',compact('data'));
    }

    public function adminOrder(){
        $data = Pesanan::where('status','telah di transfer')->get();
        $dikirim = Pesanan::where('status','dikirim')->get();
        $diterima = Pesanan::where('status','diterima')->get();
        $selesai = Pesanan::where('status','selesai')->get();

        return view('order.admin',['data'=>$data,'dikirim'=>$dikirim,'diterima'=>$diterima,'selesai'=>$selesai]);
    }

    public function delete(Request $request){
        $data = Order::find($request->id);
        $data->delete();

        return redirect()->back();
    }

    public function resi($id , Request $request){

        $data = Pesanan::find($id);
        $data->no_resi = $request->no_resi;
        $data->status = 'dikirim';
        $data->update();

        return redirect()->back();
    }

    public function terima($id){
        $data = Pesanan::find($id);
        $data->status = 'diterima';
        $data->update();

        return redirect()->back();
    }


    public function selesai($id){
        $data = Pesanan::find($id);
        $data->status = 'selesai';
        $data->update();

        return redirect()->back();
    }


}
