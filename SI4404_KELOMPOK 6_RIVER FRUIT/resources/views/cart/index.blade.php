@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="table p-5">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Barang.</th>
                            <th>Harga Barang</th>
                            <th>Jumlah Barang</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>

                        <?php $total = 0 ; $x = 0;?>
                        @foreach($cart as $x)
                            <tr>
                            <td>{{$x->id}}</td>
                            <td>{{$x->barang->name}}</td>
                            <td>Rp{{$x->barang->harga}}</td>
                            <td>{{$x->total}}</td>
                            <td>Rp {{$x->total * $x->barang->harga}}</td>
                            <td>
                                <div class="d-flex">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-success my-1" data-bs-toggle="modal" data-bs-target="#cart{{$x->id}}">
                                        Edit
                                    </button>
                                    <a href="{{route('cart.hapus' , ['id'=>$x->id])}}" class="btn btn-danger my-1">Hapus Item</a>

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
                                                                <td>{{$x->barang->id}}</td>
                                                                <td>{{$x->barang->name}}</td>
                                                                <td>{{$x->barang->stock}}</td>
                                                                <td>{{$x->barang->deskripsi}}</td>
                                                                <td>{{$x->barang->harga}}</td>
                                                            </tr>
                                                        </table>
                                                    </div>

                                                    <div class="m-1">
                                                        <form action="{{route('cart.update' , ['id'=>$x->id])}}" method="post">
                                                            @csrf
                                                            @method('post')
                                                            <span>Masukan Jumlah item</span>
                                                            @if($x->barang->stock <= 0)
                                                                <button class="btn btn-danger w-100" disabled>Maaf Stok Tidak Tersedia</button>
                                                            @else
                                                                <input type="number" value="{{$x->total}}" name="total" class="form-control" min="1" max="{{$x->stock}}" id="stocks{{$x->id}}">
                                                                <button type="submit" class=" m-1 w-100 btn btn-success">Update</button>
                                                            @endif

                                                            <script>
                                                                document.getElementById("stocks{{$x->id}}").addEventListener("change", function () {
                                                                    let v = parseInt(this.value);
                                                                    if(v < 1) this.value = 1;
                                                                    if(v > {{$x->barang->stock}}) this.value = {{$x->barang->stock}};
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
                            </td>
                            <?php $total += ($x->total * $x->barang->harga) ;?>
                            </tr>

                        @endforeach

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><b>Total : Rp{{$total}} </b></td>
                    </tr>
                    </thead>
                </table>
            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Checkout now
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Isi Data Diri</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{route('order.store' , ['total' => $total])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                        <div class="modal-body">
                            <div class="form-group m-2">
                                <label for="">Alamat</label>
                                <input type="text" name="alamat" class="form-control">
                            </div>

                            <div class="m-2">
                                <label for="formFile" class="form-label">Masukan Bukti Transfer</label>
                                <input class="form-control" type="file" id="formFile" name="bukti_trf" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
