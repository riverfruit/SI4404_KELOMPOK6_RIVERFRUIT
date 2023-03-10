@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session('barang'))
            <div class="alert alert-primary d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <div>
                  Barang Berhasil Di Delete
                </div>
            </div>
        @endif
        <div class="card p-5">
            <h2 class="text-center">Input Barang</h2>
            <hr>

            <form action="{{route('admin.barang.store' )}}" class="form" enctype="multipart/form-data" method="post">
                @csrf
                @method('post')
                <div class="input-group m-2">
                    <span class="input-group-text"> Nama Barang</span>
                    <input type="text" name="name" class="form-control" placeholder="Taruh Nama Barang Disini" required>
                </div>

                <div class="input-group m-2">
                    <span class="input-group-text"> Deskripsi Barang</span>
                    <textarea name="deskripsi" class="form-control" id="deskripsi" cols="30" rows="10" placeholder="Taruh Deskripsi Barang Disini"></textarea>
                </div>

                <div class="input-group m-2">
                    <span class="input-group-text"> Stock</span>
                    <input type="number" name="stock" class="form-control" placeholder="Taruh Stock barang Disini" required>
                </div>

                <div class="input-group m-2">
                        <label for="exampleFormControlInput1" class="form-label">Harga</label>
                        <input type="number" class="form-control w-100" id="exampleFormControlInput1" name="harga" required placeholder="Taruh Harga Barang Disini">
                </div>
                <div class="m-2">
                    <label for="formFile" class="form-label">Masukan Foto Barang</label>
                    <input class="form-control" type="file" id="formFile" name="foto_barang" required>
                </div>
                <div class="input-group m-2">
                    <button class="btn btn-warning w-100" type="submit">Submit</button>
                </div>

            </form>
        </div>
    </div>
@endsection
