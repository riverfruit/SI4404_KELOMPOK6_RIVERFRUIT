@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card p-5">
            <h2 class="text-center">Input Barang</h2>
            <hr>
            <form action="{{route('admin.barang.edit', ['id'=>$data->id])}}" class="form" enctype="multipart/form-data" method="post">
                @csrf
                @method('post')
                <div class="input-group m-2">
                    <span class="input-group-text"> Nama Barang</span>
                    <input type="text" name="name" class="form-control" value="{{$data->name}}" placeholder="Taruh Nama Barang Disini" required>
                </div>

                <div class="input-group m-2">
                    <span class="input-group-text"> Deskripsi Barang</span>
                    <textarea name="deskripsi" class="form-control" id="deskripsi" cols="30" rows="10" placeholder="Taruh Deskripsi Barang Disini">{{$data->deskripsi}}</textarea>
                </div>

                <div class="input-group m-2">
                    <span class="input-group-text"> Stock</span>
                    <input type="number" name="stock" class="form-control" placeholder="Taruh Stock barang Disini" value="{{$data->stock}}" required>
                </div>

                <div class="input-group m-2">
                    <label for="exampleFormControlInput1" class="form-label">Harga</label>
                    <input type="number" class="form-control w-100" id="exampleFormControlInput1" name="harga" value="{{$data->harga}}" required placeholder="Taruh Harga Barang Disini">
                </div>
                <div class="m-2">
                    <label for="formFile" class="form-label">Masukan Foto Barang (jika diganti)</label>
                    <input class="form-control" type="file" id="formFile" name="foto_barang" >
                </div>
                <div class="input-group m-2">
                    <button class="btn btn-warning w-100" type="submit">Submit</button>
                </div>

            </form>
        </div>
    </div>

    <div class="card-footer text-muted text-center">
     Created by : SI4404_KELOMPOK 06_RIVER FRUIT
     </div>
@endsection
