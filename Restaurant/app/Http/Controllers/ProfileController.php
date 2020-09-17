<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    function myprofile($id){

        $profile = User::find($id);

        return view('myprofile', compact('profile'));

    }

    function edit($id){

        $profile = User::find($id);
        return view('editprofile', compact('profile'));

    }


    
    public function update(Request $request, $id){
       
        $profile = User::find($id);
       
        $profile->name = $request->name;
        $profile->email = $request->email;
        $profile->phone = $request->phone;
        $profile->address = $request->address;
        $profile->updated_at = now();
        $profile->save();
  
      //   return redirect('/products');//->with('status', 'Item has been updated');
  
        return redirect('/myprofile/' . $profile->id)->with('status', 'Profile has been updated');
      }
      

      function makeadmin(Request $request){

          $user_id = $request->input('admin');

          $admin = User::find($user_id);

          if($admin->role == 'admin' && $admin->id != 1){
              $admin->role = 'user';
          } else {
          $admin->role = 'admin';
          }

          $admin->save();

          return redirect('/users/')->with('status', 'Admin has been changed');


      }


}
