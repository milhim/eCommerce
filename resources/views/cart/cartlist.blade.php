    @extends('master')

    @section('content')

    <div class="container mt-4">

            <a href="{{route('ordernow')}}" class="btn btn-success d-block m-2 fixed-bottom">Order Now</a>
            @foreach ($data as $product)
            <div class="row" style="border-bottom: 1px solid gray; margin: 10px 2px;padding: 10px 0px">
                <div class="col-md-4">
                    <img width="300px" height="200px" src="{{$product->gallery}}" alt="product-image">
                </div>

                <div class="col-md-6">
                    <h1>{{$product->name}}</h1>
                    <p>{{$product->description}}</p>
                </div>

                <div class="col-md-2">
                    <form action="{{route('remove-from-cart',$product->cart_id)}}" method="POST">

                        @csrf
                        <button type="submit" class="btn btn-danger">Remove</button>
                    </form>

                </div>
            </div>
            @endforeach
    </div>


    @endsection

