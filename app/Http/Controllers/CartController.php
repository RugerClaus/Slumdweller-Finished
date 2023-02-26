<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addToCart(Request $request) 
    {
        $id = $request->id;
        $variation = $request->variation;


        $item = DB::table('products')->where('id', $id)->get('*');
        

        DB::table('carts')->insert([
            'name' => $item[0]->name,
            'price' => $item[0]->price,
            'description' => $item[0]->description,
            'imageURL' => $item[0]->image1,
            'variation' => $variation,
            'UserId' => session()->getId()
        ]);
        if($item[0]->type === 'media'){
            return redirect()->route('pages.cart');
        }
        else {
            return redirect()->route('pages.cart');
        }
    }
    public function removeFromCart(Request $request) 
    {
        $id = $request->id;
        DB::table('carts')->where('id', $id)->delete();
        return redirect()->route('pages.cart');
    }
}
