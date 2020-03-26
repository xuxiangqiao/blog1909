<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cart;
class CartController extends Controller
{
    public function cart(){

    	$user_id = 1;
    	$cart = Cart::where('user_id',$user_id)->get();
    	
    	$buy_number = array_column($cart->toArray(),'buy_number');
    	$cart_id = array_column($cart->toArray(),'cart_id');
// dd($buy_number);
    	return view('index.cart',['cart'=>$cart,'buy_number'=>$buy_number,'cart_id'=>$cart_id]);
    }
}
