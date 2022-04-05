@extends('master')

@section('content')
    <div class="container">
        <div class="row mt-5 card" style="height: 350px">
            <div class="col-md-4 card-body">

                <div>
                    <img height="300px" width="200px" src=" {{ $product->gallery }}" alt="">

                </div>
            </div>

            <div class="col-md-5 card-body">
                <a href="{{ route('index') }}" class="btn btn-block btn-secondary">Go back</a>
                <div class="mt-5 d-flex flex-column ">
                    <p>Name : {{ $product->name }}</p>
                    <p>Description : {{ $product->description }}</p>
                    <p>Category : {{ $product->category }}</p>
                    <p>Price : {{ $product->price }}</p>

                </div>

                <form action="{{ route('add_to_cart') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">


                    <button type="submit" class=" btn btn-primary">Add to cart</button>


                </form>

                <button class=" btn btn-success">Buy now</button>

            </div>
        </div>
    </div>
@endsection
