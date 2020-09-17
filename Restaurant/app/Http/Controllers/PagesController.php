<?php

namespace App\Http\Controllers;

use App\User;
use App\Topselling;
use App\Item;
use Illuminate\Http\Request;
Use Response;

class PagesController extends Controller
{
    
    function index(){
        $items = Topselling::orderBy('id', 'desc')->get();

        return view('index', compact('items'));
    }
    
    function contactus(){
        return view('contactus');
    }

    function menu(){
        $items = Item::orderBy('id', 'desc')->get();
        return view('menu', compact('items'));
    }

    function mycart(){
        return view('mycart');
    }
    
    function filterPizza(){
        $items = Item::orderBy('id', 'desc')->where('category', '=' , 'pizza')->get();
        return view('menu', compact('items'));
    }

    function filterBurger(){
        $items = Item::orderBy('id', 'desc')->where('category', '=' , 'burger')->get();
        return view('menu', compact('items'));
    }
    

    
    
    function addItem(){
        return view('additem');
    }



    
    function users() {

        $users = User::orderBy('id', 'desc')->paginate(50);
        return view('users', compact('users'));

    }


    function jsonTest(){

        $users = User::get();
        return response()->json($users);


        
        // Return view('jsonTest', compact('users'));
    }

    
}
