<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->check()){
            $id = auth()->user()->id;
            Cart::restore($id);
            $cartItems = Cart::content();
            Cart::store($id);
        }
        else{
            Cart::restore('200');
            $cartItems = Cart::content();
            Cart::store('200');
        }

        return view('cart.index',compact('cartItems'));
    }
    public function ekle()
    {
        $product = Product::find(request('id'));
        if(auth()->check()){
            $user_id = auth()->user()->id;
            Cart::restore($user_id);
            Cart::add($product->id,$product->name,1,$product->price);
            Cart::store($user_id);
        }
        else{
            Cart::restore('200');
            Cart::add($product->id,$product->name,1,$product->price);
            Cart::store('200');
        }
        return redirect()->route('cart');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        if(auth()->check()){
            $user_id = auth()->user()->id;
            Cart::restore($user_id);
            Cart::add($id,$product->name,1,$product->price);
            Cart::store($user_id);
        }
        else{
            Cart::restore('200');
            Cart::add($id,$product->name,1,$product->price);
            Cart::store('200');
        }
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(auth()->check()){
            $user_id = auth()->user()->id;
            Cart::restore($user_id);
            Cart::update($id, $request->qty);
            Cart::store($user_id);
        }
        else{
            Cart::restore('200');
            Cart::update($id, $request->qty);
            Cart::store('200');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->check()){
            $user_id = auth()->user()->id;
            Cart::restore($user_id);
            Cart::remove($id);
            Cart::store($user_id);
        }
        else{
            Cart::restore('200');
            Cart::remove($id);
            Cart::store('200');
        }
        return back();
    }
}