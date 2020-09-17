<?php

namespace App\Http\Controllers;
use Storage;
use App\Item;
use Illuminate\Http\Request;

class itemsController extends Controller
{
    function add(Request $request){

        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = 'imgssss' . '_' . time() . '.' . $ext; 
            $file->storeAs('public/imgs', $filename);
  
          } else {
            $filename = 'logo.png';
          }
  
        $item = new Item;

        $item->name = $request->name;
        $item->category = $request->category;
        $item->price = $request->price;
        $item->img = $filename;

        $item->save();

        return redirect('/additem')->with('status', 'Item has been added');


    }

    
    public function edit($id){

      $item = Item::find($id);
      return view('edit' , compact('item'));


  }

    public function update(Request $request, $id){
       
      $item = Item::find($id);
     
      $item->name = $request->name;
      $item->category = $request->category;
      $item->price = $request->price;
      $item->save();

    //   return redirect('/products');//->with('status', 'Item has been updated');

      return redirect('/menu/')->with('status', 'Item has been updated');
    }



    public function delete($id){

      $item = Item::find($id);

      $name=str_replace('/storage' ,'public' ,$item->image);
      Storage::delete([$name]);

      

      $item->delete();

      return redirect('/')->with('status', 'Item has been deleted');

    }

}
