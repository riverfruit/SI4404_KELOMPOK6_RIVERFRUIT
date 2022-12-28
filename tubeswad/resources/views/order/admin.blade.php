@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card p-5">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Pesanan Sudah Di Transfer</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Pesanan Sudah Dikirim</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Pesanan Diterima</button>
                </li>

                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#selesai" type="button" role="tab" aria-controls="contact" aria-selected="false">Pesanan Selesai</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="table p-2">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>No Invoice.</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>No Resi</th>
                                <th>Bukti Transfer</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>

                            @foreach($data as $x)
                                <tr>
                                    <td>{{$x->id}}</td>
                                    <td>{{$x->alamat}}</td>
                                    <td>{{$x->status}}</td>
                                    <td>{{$x->no_resi}}</td>
                                    <td> <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary my-1" data-bs-toggle="modal" data-bs-target="#resi{{$x->id}}">
                                            Bukti
                                        </button>


                                        <!-- Modal -->
                                        <div class="modal modal-lg fade" id="resi{{$x->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Detail Barang {{$x->name}}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                        <div class="modal-body">
                                                            <div class="table p-1">
                                                                <img src="{{asset('/bukti_trf/'.$x->bukti_trf)}}" class="img-fluid" alt="">
                                                            </div>
                                                        </div>


                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>


                                                </div>
                                            </div>
                                        </div></td>
                                    <td>Rp {{$x->total}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-success my-1" data-bs-toggle="modal" data-bs-target="#cart{{$x->id}}">
                                                Detail
                                            </button>


                                            <!-- Modal -->
                                            <div class="modal modal-lg fade" id="cart{{$x->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Detail Barang {{$x->name}}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{route('admin.order.resi' , ['id'=>$x->id])}}" method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="table p-1">
                                                                    <table class="table">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>No.</th>
                                                                            <th>Nama Barang.</th>
                                                                            <th>Harga Barang</th>
                                                                            <th>Jumlah Barang</th>
                                                                            <th>Total</th>

                                                                        </tr>

                                                                        <?php $totals = 0 ; $z = 0; ;$f = 1;?>
                                                                        @foreach($x->order as $order)
                                                                            <tr>
                                                                                <td>{{$f}}</td>
                                                                                <td>{{$order->barang->name}}</td>
                                                                                <td>{{$order->barang->harga}}</td>
                                                                                <td>{{$order->total}}</td>
                                                                                <td>{{$order->total * $order->barang->harga}}</td>
                                                                            </tr>
                                                                            <?php $f++ ; $totals+=$order->total * $order->barang->harga ?>
                                                                        @endforeach

                                                                        <tr>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>

                                                                            <td><b>Total : Rp{{$totals}} </b></td>
                                                                        </tr>
                                                                        </thead>
                                                                    </table>
                                                                </div>
                                                                <div class="form-group">
                                                                    @if($x->status == "telah di transfer")
                                                                        <label for="">Masukan No Resi</label>
                                                                        <input type="text" class="form-control" name="no_resi">
                                                                    @endif
                                                                </div>
                                                            </div>


                                                            <div class="modal-footer">
                                                                @if($x->status == "telah di transfer")
                                                                    <button class="btn btn-success" type="submit">Masukan Resi</button>
                                                                @endif
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @if($x->status == 'diterima')
                                            <a href="{{route('admin.selesai' , ['id'=>$x->id])}}" class="btn btn-success">Selesai</a>
                                        @endif
                                    </td>

                                </tr>

                            @endforeach

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </thead>
                        </table>


                    </div>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="table p-2">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>No Invoice.</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>No Resi</th>
                                <th>Bukti Transfer</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>

                            @foreach($dikirim as $x)
                                <tr>
                                    <td>{{$x->id}}</td>
                                    <td>{{$x->alamat}}</td>
                                    <td>{{$x->status}}</td>
                                    <td>{{$x->no_resi}}</td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary my-1" data-bs-toggle="modal" data-bs-target="#resi{{$x->id}}">
                                            Bukti
                                        </button>


                                        <!-- Modal -->
                                        <div class="modal modal-lg fade" id="resi{{$x->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Detail Barang {{$x->name}}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="table p-1">
                                                            <img src="{{asset('/bukti_trf/'.$x->bukti_trf)}}" class="img-fluid" alt="">
                                                        </div>
                                                    </div>


                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>


                                                </div>
                                            </div>
                                        </div></td>
                                    </td>
                                    <td>Rp {{$x->total}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-success my-1" data-bs-toggle="modal" data-bs-target="#cart{{$x->id}}">
                                                Detail
                                            </button>


                                            <!-- Modal -->
                                            <div class="modal modal-lg fade" id="cart{{$x->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Detail Barang {{$x->name}}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{route('admin.order.resi' , ['id'=>$x->id])}}" method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="table p-1">
                                                                    <table class="table">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>No.</th>
                                                                            <th>Nama Barang.</th>
                                                                            <th>Harga Barang</th>
                                                                            <th>Jumlah Barang</th>
                                                                            <th>Total</th>

                                                                        </tr>

                                                                        <?php $totals = 0 ; $z = 0; ;$f = 1;?>
                                                                        @foreach($x->order as $order)
                                                                            <tr>
                                                                                <td>{{$f}}</td>
                                                                                <td>{{$order->barang->name}}</td>
                                                                                <td>{{$order->barang->harga}}</td>
                                                                                <td>{{$order->total}}</td>
                                                                                <td>{{$order->total * $order->barang->harga}}</td>
                                                                            </tr>
                                                                            <?php $f++ ; $totals+=$order->total * $order->barang->harga ?>
                                                                        @endforeach

                                                                        <tr>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>

                                                                            <td><b>Total : Rp{{$totals}} </b></td>
                                                                        </tr>
                                                                        </thead>
                                                                    </table>
                                                                </div>
                                                                <div class="form-group">
                                                                    @if($x->status == "telah di transfer")
                                                                        <label for="">Masukan No Resi</label>
                                                                        <input type="text" class="form-control" name="no_resi">
                                                                    @endif
                                                                </div>
                                                            </div>


                                                            <div class="modal-footer">
                                                                @if($x->status == "telah di transfer")
                                                                    <button class="btn btn-success" type="submit">Masukan Resi</button>
                                                                @endif
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @if($x->status == 'diterima')
                                            <a href="{{route('admin.selesai' , ['id'=>$x->id])}}" class="btn btn-success">Selesai</a>
                                        @endif
                                    </td>

                                </tr>

                            @endforeach

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </thead>
                        </table>


                    </div>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="table p-2">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>No Invoice.</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>No Resi</th>
                                <th>Bukti Transfer</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>

                            @foreach($diterima as $x)
                                <tr>
                                    <td>{{$x->id}}</td>
                                    <td>{{$x->alamat}}</td>
                                    <td>{{$x->status}}</td>
                                    <td>{{$x->no_resi}}</td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary my-1" data-bs-toggle="modal" data-bs-target="#resi{{$x->id}}">
                                            Bukti
                                        </button>


                                        <!-- Modal -->
                                        <div class="modal modal-lg fade" id="resi{{$x->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Detail Barang {{$x->name}}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="table p-1">
                                                            <img src="{{asset('/bukti_trf/'.$x->bukti_trf)}}" class="img-fluid" alt="">
                                                        </div>
                                                    </div>


                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>


                                                </div>
                                            </div>
                                        </div></td>
                                    </td>
                                    <td>Rp {{$x->total}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-success my-1" data-bs-toggle="modal" data-bs-target="#cart{{$x->id}}">
                                                Detail
                                            </button>


                                            <!-- Modal -->
                                            <div class="modal modal-lg fade" id="cart{{$x->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Detail Barang {{$x->name}}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{route('admin.order.resi' , ['id'=>$x->id])}}" method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="table p-1">
                                                                    <table class="table">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>No.</th>
                                                                            <th>Nama Barang.</th>
                                                                            <th>Harga Barang</th>
                                                                            <th>Jumlah Barang</th>
                                                                            <th>Total</th>

                                                                        </tr>

                                                                        <?php $totals = 0 ; $z = 0; ;$f = 1;?>
                                                                        @foreach($x->order as $order)
                                                                            <tr>
                                                                                <td>{{$f}}</td>
                                                                                <td>{{$order->barang->name}}</td>
                                                                                <td>{{$order->barang->harga}}</td>
                                                                                <td>{{$order->total}}</td>
                                                                                <td>{{$order->total * $order->barang->harga}}</td>
                                                                            </tr>
                                                                            <?php $f++ ; $totals+=$order->total * $order->barang->harga ?>
                                                                        @endforeach

                                                                        <tr>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>

                                                                            <td><b>Total : Rp{{$totals}} </b></td>
                                                                        </tr>
                                                                        </thead>
                                                                    </table>
                                                                </div>
                                                                <div class="form-group">
                                                                    @if($x->status == "telah di transfer")
                                                                        <label for="">Masukan No Resi</label>
                                                                        <input type="text" class="form-control" name="no_resi">
                                                                    @endif
                                                                </div>
                                                            </div>


                                                            <div class="modal-footer">
                                                                @if($x->status == "telah di transfer")
                                                                    <button class="btn btn-success" type="submit">Masukan Resi</button>
                                                                @endif
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @if($x->status == 'diterima')
                                            <a href="{{route('admin.selesai' , ['id'=>$x->id])}}" class="btn btn-success">Selesai</a>
                                        @endif
                                    </td>

                                </tr>

                            @endforeach

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </thead>
                        </table>


                    </div>
                </div>
                <div class="tab-pane fade" id="selesai" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="table p-2">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>No Invoice.</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>No Resi</th>
                                <th>Bukti Transfer</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>

                            @foreach($selesai as $x)
                                <tr>
                                    <td>{{$x->id}}</td>
                                    <td>{{$x->alamat}}</td>
                                    <td>{{$x->status}}</td>
                                    <td>{{$x->no_resi}}</td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary my-1" data-bs-toggle="modal" data-bs-target="#resi{{$x->id}}">
                                            Bukti
                                        </button>


                                        <!-- Modal -->
                                        <div class="modal modal-lg fade" id="resi{{$x->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Detail Barang {{$x->name}}</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="table p-1">
                                                            <img src="{{asset('/bukti_trf/'.$x->bukti_trf)}}" class="img-fluid" alt="">
                                                        </div>
                                                    </div>


                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>


                                                </div>
                                            </div>
                                        </div></td>
                                    </td>
                                    <td>Rp {{$x->total}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-success my-1" data-bs-toggle="modal" data-bs-target="#cart{{$x->id}}">
                                                Detail
                                            </button>


                                            <!-- Modal -->
                                            <div class="modal modal-lg fade" id="cart{{$x->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Detail Barang {{$x->name}}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{route('admin.order.resi' , ['id'=>$x->id])}}" method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="table p-1">
                                                                    <table class="table">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>No.</th>
                                                                            <th>Nama Barang.</th>
                                                                            <th>Harga Barang</th>
                                                                            <th>Jumlah Barang</th>
                                                                            <th>Total</th>

                                                                        </tr>

                                                                        <?php $totals = 0 ; $z = 0; ;$f = 1;?>
                                                                        @foreach($x->order as $order)
                                                                            <tr>
                                                                                <td>{{$f}}</td>
                                                                                <td>{{$order->barang->name}}</td>
                                                                                <td>{{$order->barang->harga}}</td>
                                                                                <td>{{$order->total}}</td>
                                                                                <td>{{$order->total * $order->barang->harga}}</td>
                                                                            </tr>
                                                                            <?php $f++ ; $totals+=$order->total * $order->barang->harga ?>
                                                                        @endforeach

                                                                        <tr>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td></td>

                                                                            <td><b>Total : Rp{{$totals}} </b></td>
                                                                        </tr>
                                                                        </thead>
                                                                    </table>
                                                                </div>
                                                                <div class="form-group">
                                                                    @if($x->status == "telah di transfer")
                                                                        <label for="">Masukan No Resi</label>
                                                                        <input type="text" class="form-control" name="no_resi">
                                                                    @endif
                                                                </div>
                                                            </div>


                                                            <div class="modal-footer">
                                                                @if($x->status == "telah di transfer")
                                                                    <button class="btn btn-success" type="submit">Masukan Resi</button>
                                                                @endif
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @if($x->status == 'diterima')
                                            <a href="{{route('admin.selesai' , ['id'=>$x->id])}}" class="btn btn-success">Selesai</a>
                                        @endif
                                    </td>

                                </tr>

                            @endforeach

                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </thead>
                        </table>


                    </div>
                </div>
            </div>




        </div>
    </div>
@endsection
