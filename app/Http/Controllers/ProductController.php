<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::all();

        return view('product.index', ['products' => $data]);
    }
    public function showDetail($id)
    {

        $product = Product::find($id);

        return view('product.detail', ['product' => $product]);
    }

    public function addToCart(Request $req)
    {
        if ($req->session()->has(('user'))) {

            $cart = new Cart();
            $cart->user_id = $req->session()->get('user')['id'];
            $cart->product_id = $req->product_id;

            $cart->save();

            return back();
        }
        return redirect(route('login'));
    }

    public static function cartItem()
    {
        $user_id = Session::get('user')['id'];
        Cart::where('user_id', $user_id)->count();
        return Cart::where('user_id', $user_id)->count();
    }

    public static function remove($id)
    {


        Cart::destroy($id);
        return back();
    }
    public function orderNow()
    {

        $user_id = Session::get('user')['id'];
        $totalPrice = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $user_id)
            ->sum('products.price');

        return view('cart.ordernow', ['totalPrice' => $totalPrice]);
    }
    public function placeOrder(Request $req)
    {
        $user_id = Session::get('user')['id'];
        $allcart = Cart::where('user_id', $user_id)->get();

        foreach ($allcart as $cart) {
            $order = new Order();
            $order->product_id = $cart->product_id;
            $order->user_id = $cart->user_id;
            $order->status = 'pending';
            $order->payment_method = $req->input('payment_method');
            $order->payment_status = 'pending';
            $order->address = $req->input('address');

            $order->save();

            Cart::where('user_id', $user_id)->delete();
        }
        return redirect(route('cart.list', $user_id));
    }

    public function showOrders(){


        $user_id = Session::get('user')['id'];

        $data=DB::table('orders')
        ->join('products','orders.product_id','=','products.id')
        ->where('orders.user_id',$user_id)
        ->get();

        return view('orders.index',['orders'=>$data]);
    }
}
