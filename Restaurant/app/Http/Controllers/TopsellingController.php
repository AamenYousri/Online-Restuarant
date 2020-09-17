<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use App\Topselling;
use App\Cart;

class TopsellingController extends Controller
{

    function addItem(){
        return view('addtopselling');
    }


    function add(Request $request){

        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = 'imgssss' . '_' . time() . '.' . $ext; 
            $file->storeAs('public/imgs', $filename);
  
          } else {
            $filename = 'logo.png';
          }
  
        $item = new Topselling;

        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->img = $filename;

        $item->save();

        return redirect('/addtopselling')->with('status', 'Item has been added');


    }

    



    public function delete($id){

      $item = Topselling::find($id);

      $name=str_replace('/storage' ,'public' ,$item->image);
      Storage::delete([$name]);

      

      $item->delete();

      return redirect('/')->with('status', 'Item has been deleted');


    }




    
    function addCart($id){
        $item = Topselling::find($id);
        $cart = new Cart;

        $cart->name = $item->name;
        $cart->price = $item->price;
        $cart->img = $item->img;
        $cart->user_id = auth()->user()->id;

        $cart->save();

        return redirect('/')->with('status', 'Item has been added to cart');


    }



}
