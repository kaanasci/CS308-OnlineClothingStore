<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('welcome', compact('products'));
        //return view('invoice');

    }
    public function adminindex()
    {

        return view('admin.login');

    }
    public function tops()
    {
        $products = Product::all();
        return view('front.tops', compact('products'));
    }
    
    public function top()
    {
        return view('front.top');
    }
}
