@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="card p-5">
            <h2 class="text-center">List Barang</h2>
            <hr>

            <a href="{{route('admin.barang.index')}}" class="btn btn-success m-2">Add Barang</a>
            <form action="{{route('admin.barangSearch')}}" method="get" >
                @csrf
                @method('get')
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" name="search" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                </div>
            </form>

                <div class="d-flex flex-wrap ">
                    @foreach($data as $x)
                        <div class="card m-3" style="width: 18rem;">
                            <img src="{{asset('/foto_barang/'.$x->foto)}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$x->name}}</h5>
                                <p class="card-text">{{$x->deskripsi}}</p>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detail{{$x->id}}">
                                    Detail
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="detail{{$x->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Barang {{$x->name}}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Nama barang</th>
                                                            <th>Stock</th>
                                                            <th>Deskripsi</th>
                                                            <th>Harga</th>
                                                        </tr>
                                                        <tr>
                                                            <td>{{$x->id}}</td>
                                                            <td>{{$x->name}}</td>
                                                            <td>{{$x->stock}}</td>
                                                            <td>{{$x->deskripsi}}</td>
                                                            <td>{{$x->harga}}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route('admin.barang.edit' , ['id'=>$x->id])}}" class="btn btn-success">Update</a>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$x->id}}">
                                    Delete
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="delete{{$x->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Barang {{$x->name}}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                              <h3 class="text-center">Apakah Yaking ingin Delete File</h3>
                                            </div>
                                            <div class="modal-footer">
                                                    <a class="btn btn-danger" href="{{route('admin.barang.delete' , ['id'=>$x->id])}}" type="submit">Delete</a>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    @endforeach
                </div>


        </div>
    </div>
    @endsection
