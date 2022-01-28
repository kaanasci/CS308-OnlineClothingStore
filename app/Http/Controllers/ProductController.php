<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products =  Product::all();
        return view('front.tops', compact('products'));
    }
    public function adminindex()
    {
        return view('admin.home');
    }
    public function productindex()
    {
        $products =  Product::all();
        return view('admin.product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productform()
    {

        return view('admin.form');
    }
    public function create()
    {
        $categories = Category::pluck('name','id');
        return response()->json($categories->toArray());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $product = Product::create([
                                     'name' => $data['name'],
                                     'model' => $data['model'],
                                     'number' => $data['number'],
                                     'description' => $data['description'],
                                     'quantity_in_stocks' => $data['quantity_in_stocks'],
                                     'price' => $data['price'],
                                     'warranty_status' => $data['warranty_status'],
                                     'distributor_info' => $data['distributor_info'],
                                     'image' => $data['image'],
                                   ]);
        DB::table('category_product')->insert([
                                                'category_id' => $request->category_id,
                                                'product_id' => $product->id,
                                              ]);


        $products =  Product::all();
        return view('admin.product', compact('products'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Product::find($id);
        //return response()->json($product->toArray());
        $reviews = $this->reviews($data->id);
        $average = $this->avg($data->id);
        if(!($average < 5 && $average > 0)){
            $average = 0;
        }
        if($data->quantity_in_stocks == 0){
            $data->stock = 'Out of Stock';
            return view('front.top',['product'=>$data,'reviews'=>$reviews,'average'=>$average]); 
        }
        return view('front.top',['product'=>$data,'reviews'=>$reviews,'average'=>$average]);
        //return response()->json($product->toArray());

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $product = Product::find($id);
        $product->quantity_in_stocks = $request->qty;
        $product->save();
        $products =  Product::all();
        return view('admin.product', compact('products'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        $products =  Product::all();
        return view('admin.product', compact('products'));
    }

    public function search(Request $request){
        $query = $request->input('search');
        $products = Product::where('name', 'like', "%$query%")->get();
        return view('front.tops',compact('products'));
    }

    public function avg($id)
    {
        $average = Product::find($id)->reviews->avg('rating');
        $avg = round($average,2);
        return $average;
        //return response()->json($average);
    }

    public function SetPrice(Request $request,$id)
    {
        $product = Product::find($id);
        $product->price = $request->price;
        $product->save();

        $products =  Product::all();
        return view('salesman.products', compact('products'));
    }

    public function discount(Request $request,$id)
    {
        $product = Product::find($id);
        $discount = ($product->price*($request->rate/100));
        $product->price = ($product->price-$discount);
        $product->save();
        $products =  Product::all();
        return view('salesman.products', compact('products'));
    }
    public function reviews($id)
    {
        $reviews = Product::find($id)->reviews;
        foreach($reviews as $key => $review){
            if($review['approved'] == '0'){
                unset($reviews[$key]);
            }
        }
        //return response()->json($reviews->toArray());
        return $reviews;
    }
}
