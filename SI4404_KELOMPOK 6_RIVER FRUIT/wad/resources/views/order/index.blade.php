@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="table p-5">
                <table class="table">
                    <thead>
                    <tr>
                        <th>No Invoice.</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>No Resi</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>

                    @foreach($data as $x)
                        <tr>
                            <td>{{$x->id}}</td>
                            <td>{{$x->alamat}}</td>
                            <td>{{$x->status}}</td>
                            <td>{{$x->no_resi}}</td>
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
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if($x->status == 'dikirim')
                                    <a href="{{route('order.terima' , ['id'=>$x->id])}}" class="btn btn-success">Selesai</a>
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
@endsection
