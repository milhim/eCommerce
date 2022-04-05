@extends('master')

@section('content')
    <h1>{{ $totalPrice }}</h1>

    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">

                <table class="table">

                    <tbody>
                        <tr>
                            <td>Amount</td>
                            <td>{{ $totalPrice }}$</td>
                        </tr>
                        <tr>
                            <td>Tax</td>
                            <td>{{ $tax = rand(1, 20) }}$</td>
                        </tr>
                        <tr>
                            <td>Delevery</td>
                            <td>{{ $delevery = rand(1, 50) }}$</td>
                        </tr>
                        <tr>
                            <td>Total Amount</td>
                            <td>{{ $totalPrice + $tax + $delevery }}$</td>
                        </tr>
                    </tbody>
                </table>

            </div>

            <div class="container " style="border-top: 1px solid gray">


                <div class="row mt-5">

                    <div class="col-md-8 offset-2 order-md-1">
                        <h4 class="mb-3">Billing address</h4>
                        <form class="" action="{{route('placeorder')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name">
                                </div>
                            </div>



                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com">

                            </div>

                            <div class="mb-3">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control" id="address" placeholder="1234 Main St" >

                            </div>


                            <hr class="mb-4">

                            <h4 class="mb-3">Payment</h4>

                            <div class="d-block my-3">
                                <div class="custom-control custom-radio">
                                    <input id="credit" name="payment_method" type="radio" class="custom-control-input"
                                        checked value="Credit Card">
                                    <label class="custom-control-label" for="credit">Credit card</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="debit" value="Debit Card" name="payment_method" type="radio" class="custom-control-input"
                                    >
                                    <label class="custom-control-label" for="debit">Debit card</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input id="paypal" value="PayPal" name="payment_method" type="radio" class="custom-control-input"
                                        >
                                    <label class="custom-control-label" for="paypal">PayPal</label>
                                </div>
                            </div>


                            <hr class="mb-4">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
                        </form>
                    </div>
                </div>

                <footer class="my-5 pt-5 text-muted text-center text-small">
                    <p class="mb-1">© 2021 - 2045 Company Name</p>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#">Privacy</a></li>
                        <li class="list-inline-item"><a href="#">Terms</a></li>
                        <li class="list-inline-item"><a href="#">Support</a></li>
                    </ul>
                </footer>
            </div>
        </div>
    </div>
@endsection
