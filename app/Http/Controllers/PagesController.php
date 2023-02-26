<?php

namespace App\Http\Controllers;

use App\Models\Attributes;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function index()
    {   
        $tours = Tour::all();
        return view('pages.welcome', compact('tours'));
    }
    public function merch()
    {
        $merchandise = Product::all()->where('type', 'merch');
        return view('pages.merch', compact('merchandise'));   
    }
    public function media()
    {
        $media = Product::all()->where('type','media');
        return view('pages.media', compact('media'));  
    }
    public function about()
    {
        return view('pages.about');
    }
    public function contact()
    {
        return view('pages.contact');
    }
    public function details(Request $request) 
    {
        $id = $request->id;
        $name = $request->name;
        $item = Product::all()->where('id', $id);
        $attributes = Attributes::all()->where('name', $name);
        return view('pages.details',['item' => $item,'attributes' => $attributes]);
    }
    public function cart() 
    {
        $cart = Cart::all()->where('UserId', session()->getId());
        return view('pages.cart', compact('cart'));
    }
}
