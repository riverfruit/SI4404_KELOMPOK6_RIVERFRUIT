@extends('layouts.app')

@section('content')
    <div class="" style="width: 100% ; height: 400px ; overflow: hidden">
        <img src="{{asset('/img/fruit.jpg')}}" class="img-fluid overflow-hidden" alt="">
    </div>
    <div class="d-flex justify-content-center align-content-center m-3">
        <div class="col-5 p-2 mr-5">
            <h1 class="text-warning">River Fruit</h1>
            <p class="fs-4"> Merupakan sebuah terobosan untuk para masyarakat yang hobinya berkebun untuk mendapatkan menghasilkan
            sebuah pendapatan</p>
        </div>
        <div class="">
            <img src="{{asset('/img/pin.jpg')}}" style="max-width: 200px" class="img-thumbnail overflow-hidden d-block" alt="">
        </div>
    </div>



@endsection
