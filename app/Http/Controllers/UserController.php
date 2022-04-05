<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //



    public function index()
    {
        return view('master');
    }

    public function register(){
        return view('auth.register');
    }

    public function registerProcess(Request $req){
        $user=new User();

        $user->name=$req->input('name');
        $user->email=$req->input('email');
        $user->password=Hash::make($req->input('password'));

        $user->save();

        return redirect(route('login'));


    }

    public function login()
    {
        return view('auth.login');
    }
    public function loginProcess(Request $req)
    {

        $user = User::where(['email' => $req->email])->first();




        if (!$user || ($user->password_ != $req->password_)) {
            return 'Wrong password or email';
        } else {

            $req->session()->put('user', $user);

            return redirect(route('index'));
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();

        return redirect(route('login'));
    }

    public function showCart($id){

        $data=DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$id)
        ->select('products.*','cart.id as cart_id')
        ->get();

        return view('cart.cartlist',['data'=>$data]);


    }
}
