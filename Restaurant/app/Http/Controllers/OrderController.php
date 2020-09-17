<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\order;
use App\orderDetail;
use App\Item;
use App\Cart;


class OrderController extends Controller
{
    function create() {

    $cart = Cart::where('user_id','=', auth()->user()->id)->get();
    // $items = Item::get();
    // $cart = session()->get("cart");
    
    $o = new order();
    $o->user_id = Auth::user()->id;
    $o->archive= 'unarchived';
    $o->save();


        foreach($cart as $p) {
        // dd($items);
        // foreach($items as $item){

        $order = new orderDetail();

      
        $order->order_id=$o->id;
        $order->item_name=$p->name;
        $order->price=$p->price;
        $order->user_id= Auth::user()->id;
        $order->user_name= Auth::user()->name;


        $order->save();

        $p->delete();
        // dd($order);
       
    }







     return redirect()->action('OrderController@customerorders');


}


    function orders() {

        $orders = Order::orderBy('id', 'desc')->where('archive','=','unarchived')->paginate(50);
        return view('orders', compact('orders'));

    }


    function orderDetails() {

        $orderdetails = orderDetail::with('item','order')->orderBy('id', 'desc')->whereHas('order', function($query) {
            $query->where('archive', '=','unarchived');
        })->get();
        return view('orderdetails', compact('orderdetails'));

    }



    function customerorders() {

        $customerorders = order::orderBy('id', 'desc')->where('user_id','=', auth()->user()->id)->where('archive','=','unarchived')->get();
        $orderdetails = orderDetail::orderBy('id', 'desc')->get();
        $items = Item::orderBy('id', 'desc')->get();
        $sum = 0;

        $customerordersCount = order::orderBy('id', 'desc')->where('user_id','=', auth()->user()->id)->where('archive','=','unarchived')->count();

        

        // dd($customerordersCount);

        return view('customerorder', compact(array('customerorders' , 'orderdetails','items','sum','customerordersCount')));
      


    }



    function archive($id){

        $customerorders = order::find($id);

        $customerorders->archive = 'archived';
        $customerorders->save();

        return redirect('/orders')->with('status', 'Order has been archived');

    }



    
    public function delete($id){

        $item = orderDetail::find($id); 
        $item->delete();


  
        return redirect('/customerorder')->with('status', 'Item has been deleted');
  
      }
  

}
