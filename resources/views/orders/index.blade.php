@extends('master')

@section('content')

<div class="container mt-4">
<h1 class="text-center mb-5">My Orders</h1>
        @foreach ($orders as $order)
        <div class="row" style="border-bottom: 1px solid gray; margin: 10px 2px;padding: 10px 0px">
            <div class="col-md-4">
                <img width="300px" height="200px" src="{{$order->gallery}}" alt="product-image">
            </div>

            <div class="col-md-6 offset-2">
                <h1>Name : {{$order->name}}</h1>
                <p>Delivery Status : {{$order->status}}</p>
                <p>Address : {{$order->address}}</p>
                <p>Payment Status : {{$order->payment_status}}</p>
                <p>Payment Method : {{$order->payment_method}}</p>

            </div>


        </div>
        @endforeach
</div>


@endsection

