<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\Order;
use App\Models\Product;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminPanelController extends Controller
{
    public function index() 
    {
        $user = Auth::user()["name"];
        return view('admin.home', compact('user'));
    }
    public function addToTour() 
    {
        return view('admin.add_to_tour');
    }
    public function addProducts()
    {
        return view('admin.add_to_products');
    }
    public function productManager() 
    {
        $products = Product::all(); 
        return view('admin.product_manager', compact('products'));
    }
    public function tourManager()
    {
        $dates = Tour::all();
        return view('admin.tour_manager', compact('dates'));
    }
    public function editTour(Request $request) 
    {
        $id = $request->id;
        $show = Tour::all()->where('id', $id);
        return view('admin.editShow', compact('show'));
    }
    public function orders() {
        return view('admin.orders');
    }
    public function mail() 
    {
        $mail = Email::all();
        return view('admin.mail', compact('mail'));
    }
    public function editProduct(Request $request) 
    {
        $id = $request->id;
        $items = Product::all()->where('id', $id);
        return view('admin.editProduct', compact('items'));
    }
    public function reply(Request $request) 
    {
        $id = $request->id;
        $reply = Email::all()->where('id', $id);
        return view('admin.reply', compact('reply'));
    }
    public function problem() 
    {
        return view('admin.problem');
    }
}
