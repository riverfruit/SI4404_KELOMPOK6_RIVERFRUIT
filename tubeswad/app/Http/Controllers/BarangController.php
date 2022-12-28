<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function __construct(){}

    //fungsi melihat index menambah barang
    public function index(Request $request){
        return view('barang.addBarang');
    }
    //fungsi melihat indexbarang
    public function indexBarang(){
        $barang = Barang::all();
        return view('barang.indexBarang', ['data'=>$barang]);
    }

    //fungsi buat search barang

    public function indexBarangSearch(Request $request){
        $barang = Barang::where('name','LIKE','%'.$request->search.'%')->get();
        return view('barang.indexBarang', ['data'=>$barang]);
    }

    //fungso buat store barang

    public function store(Request $request){
        $data = new Barang();
        if ($request->foto_barang != null){
            //        upload file
            $file = $request->file('foto_barang');

            $nama_file = time()."_".$file->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'foto_barang';
            $file->move($tujuan_upload,$nama_file);

            $data->foto = $nama_file;
        }

        $data->name = $request->name;
        $data->deskripsi = $request->deskripsi;
        $data->stock = $request->stock;
        $data->harga = $request->harga;

        $data->save();

        return redirect()->route('admin.indexBarang');
    }
    //fungsi edit barang
    public function edit($id){
        $data = Barang::find($id);
        return view('barang.editBarang', ['data'=>$data]);
    }
    //fungsi update barang
    public function update(Request $request, $id){
        $data = Barang::find($id);
        if ($request->foto_barang != null){
            //        upload file
            $file = $request->file('foto_barang');

            $nama_file = time()."_".$file->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'foto_barang';
            $file->move($tujuan_upload,$nama_file);

            $data->foto = $nama_file;
        }

        $data->name = $request->name;
        $data->deskripsi = $request->deskripsi;
        $data->stock = $request->stock;
        $data->harga = $request->harga;

        $data->update();
        return redirect()->route('admin.indexBarang');
    }

    //fungsi delete barang
    public function destroy($id){
        $data = Barang::find($id);

        $data->delete();
        return redirect()->route('admin.indexBarang')->with('barang', 'Data barang telah dihapus');
    }
}
