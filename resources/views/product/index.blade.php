@extends('master')

@section('content')
    <div class="container  ">
        <div class="row">
            <div class="col-md-12 pt-5" style='height: 600px'>
                <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-inner ">
                        @foreach ($products as $product)
                            <div class="items-center carousel-item {{ $product['id'] == 1 ? 'active' : '' }}">
                                <a href="{{ route('product.detail', $product->id) }}">
                                    <img height="400px " width="600px "
                                        src="{{ $product->gallery }}" class=" d-block items-center w-100" alt="...">
                                    </a>

                                <div class="carousel-caption " style="background-color: #35443582">

                                    <h1>{{ $product->name }}</h1>
                                    <p>{{ $product->description }}</p>
                                </div>
                            </div>
                            <div class="carousel-caption " style="background-color: rgba(154, 182, 154, 0.253)">

                                <h1>{{ $product->name }}</h1>
                                <p>{{ $product->description }}</p>

                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>


            </div>
        </div>
    </div>

    <div class="container">
        <div class="row flex-md-row  flex-sm-column  d-flex ">
            <h2 style="text-align: center">Tranding Product</h2>

            @foreach ($products as $product)
                <div class="col-md-3 col-sm-1">
                    <a href="{{ route('product.detail', $product->id) }}" class="m-5 text-decoration-none "
                        style="width: 20%;">
                        <img height="150px" src="{{ $product->gallery }}" alt="">

                    </a>
                    <div>
                        <h3>{{ $product->name }}</h3>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
@endsection
