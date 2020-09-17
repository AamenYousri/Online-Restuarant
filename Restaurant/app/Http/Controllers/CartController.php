<?php

namespace App\Http\Controllers;
use Storage;
use App\Cart;
use App\Item;
use App\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function addCart($id){
        $item = Item::find($id);
        $cart = new Cart;

        $cart->name = $item->name;
        $cart->price = $item->price;
        $cart->img = $item->img;
        $cart->user_id = auth()->user()->id;

        $cart->save();

        return redirect('/menu')->with('status', 'Item has been added to cart');


    }


    function myCart(){
        $carts = Cart::orderBy('id', 'desc')->where('user_id','=', auth()->user()->id)->get();
        $count = Cart::where('user_id','=', auth()->user()->id)->get();
        $sum = 0;
        foreach($carts as $item) {

        $sum = $sum + $item->price;
        }
        return view('mycart', compact(array('carts','count','sum')));
    }


    
    
    public function delete($id){

        $item = Cart::find($id);
  
        
  
        $item->delete();
  
        return redirect('/mycart')->with('status', 'Item has been deleted');
  
      }
  

}
