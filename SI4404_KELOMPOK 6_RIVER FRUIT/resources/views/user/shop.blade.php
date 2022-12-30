@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="card p-5">
            <h2 class="text-center">List Barang</h2>
            <hr>
            <form action="{{route('shop.search')}}" method="get" >
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
                            <button type="button" class="btn btn-secondary m-1" disabled>
                                Rp{{$x->harga}}
                            </button>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#detail{{$x->id}}">
                                Detail
                            </button>

                            @if($x->stock <= 0)
                                <button class="btn btn-danger w-100" disabled>Maaf Stok Tidak Tersedia</button>
                            @else

                            @endif

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
                            <button type="button" class="btn btn-success m-1 w-100" data-bs-toggle="modal" data-bs-target="#cart{{$x->id}}">
                                Add To Cart
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="cart{{$x->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                                            <div class="m-1">
                                                <form action="{{route('add.cart' , ['id'=>$x->id])}}" method="post">
                                                    @csrf
                                                    @method('post')
                                                    <span>Masukan Jumlah item</span>
                                                    @if($x->stock <= 0)
                                                        <button class="btn btn-danger w-100" disabled>Maaf Stok Tidak Tersedia</button>
                                                    @else
                                                    <input type="number" name="total" class="form-control" min="1" max="{{$x->stock}}" id="stocks{{$x->id}}">
                                                        <button type="submit" class=" m-1 w-100 btn btn-success">Add To Cart</button>
                                                    @endif

                                                    <script>
                                                        document.getElementById("stocks{{$x->id}}").addEventListener("change", function () {
                                                            let v = parseInt(this.value);
                                                            if(v < 1) this.value = 1;
                                                            if(v > {{$x->stock}}) this.value = {{$x->stock}};
                                                        })
                                                    </script>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
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

@push('scripts')

@endpush
