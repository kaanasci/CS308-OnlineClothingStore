<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Review;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;
use PDF;

class CheckoutController extends Controller
{
    public function index()
    {
        $userInfo = auth()->user()->address;
        return view('front.order', compact('userInfo'));
    }
    public function sindex()
    {
        return view('salesman.home');
    }
    public function pindex()
    {
        $products =  Product::all();
        return view('salesman.products', compact('products'));

    }
    public function storePayment(Request $request){

        $user = auth()->user();
        Cart::restore($user->id);
        $order = $user->orders()->create([
                                           'total' => Cart::total(),
                                         ]);

        $cartItems = Cart::content();
        foreach($cartItems as $cartItem){
            $order->products()->attach($cartItem->id,[
              'qty' => $cartItem->qty,
              'total' => $cartItem->subtotal,
              'status' => 'processing',
              'address' => $request->address
            ]);
            $product = Product::find($cartItem->id);
            if($product->quantity_in_stocks < $cartItem->qty){
                return 'Product is out of stock';
            }
            $product->quantity_in_stocks = ($product->quantity_in_stocks-$cartItem->qty);
            $product->save();
        }
        $user->address = $request->address;
        $user->save();
        $data = [
            'name' => $user->name,
            'address' => $user->address,
            'email' => $user->email,
            'ID' => $order->id,
            'time' => $order->created_at,
            'total' => Cart::total(),
            'cartItems' => $cartItems
        ];
        Cart::destroy();
        Cart::store($user->id);
        $products = Product::all();
        $pdf = PDF::loadView('invoice', $data);
        Mail::send('invoice', $data, function($message) use ($data,$pdf){
            $message->to($data['email']);
            $message->subject('Invoice');
            $message->attachData($pdf->output(),'invoice.pdf');
        });
        return view('invoice',compact('data'));
        //return $pdf->download('invoice.pdf');
        //return view('welcome', compact('products'));
        //return redirect()->route('welcome');
        //return view('front.orderhistory');
    }

    public function downloadPDF(Request $request)
    {
        $pdf = PDF::loadView('invoice', $request->data);
        return $pdf->download('invoice.pdf');
    }

    public function viewInvoice(Request $request)
    {
        $data = $request->data;
        return view('invoice',compact('data'));
    }
    // product manager
    public function deliveries(){
        $users = User::all();
        $array = [];
        $number = 1;
        $total = 0;
        foreach($users as $user){
            $orders = $user->orders;
            foreach($orders as $order){
                $products = $order->products;
                foreach($products as $product){
                    $total = $total + $product->price;
                }
                $cartItems = $products;
                foreach($products as $key => $product){
                    $data = [
                        'name' => $user->name,
                        'address' => $user->address,
                        'email' => $user->email,
                        'ID' => $order->id,
                        'time' => $order->created_at,
                        'total' => $total,
                        'cartItems' => $cartItems
                    ];
                    $product->data = $data;
                    if($product->pivot->status != 'processing' && $product->pivot->status != 'in-transit'){
                        unset($products[$key]);
                    }
                }
                $array = array_merge($array, array($number => $products));
            }
        }
        //return response()->json($array);
        return view('admin.delivery', compact('array'));
    }

    public function UpdateStatus(Request $request, $id)
    {
        $order = Order::find($id);
        $order->products()->updateExistingPivot($request->product_id, ['status' => $request->status]);
        return back();
    }
    // sales manager
    public function RefundRequests(){
        $users = User::all();
        $array = [];
        $number = 1;
        $total = 0;
        foreach($users as $user){
            $orders = $user->orders;
            foreach($orders as $order){
                $products = $order->products;
                foreach($products as $product){
                    $total = $total + $product->price;
                }
                foreach($products as $key => $product){
                    $data = [
                        'name' => $user->name,
                        'address' => $user->address,
                        'email' => $user->email,
                        'ID' => $order->id,
                        'time' => $order->created_at,
                        'total' => $total,
                        'cartItems' => $products
                    ];
                    $product->data = $data;
                    if($product->pivot->status != 'Request Sent'){
                        unset($products[$key]);
                    }
                }
                $array = array_merge($array, array($number => $products));
            }
        }
        //return response()->json($array);
        return view('salesman.refunds',['array'=>$array]);

    }

    public function RefundProduct(Request $request, $id)
    {
        $order = Order::find($id);
        $order->products()->updateExistingPivot($request->product_id, ['status' => 'Cancelled']);
        // Updating the stock
        $quantity = $order->products()->find($request->product_id)->pivot->qty;
        $product = Product::find($request->product_id);
        $product->quantity_in_stocks = ($product->quantity_in_stocks+$quantity);
        $product->save();
        return back();
    }
    public function reviews()
    {
        $reviews = Review::all();
        foreach($reviews as $key => $review){
            if($review['approved'] == '1'){
                unset($reviews[$key]);
            }
        }
        return view('admin.review',compact('reviews'));
    }
    public function orders(){
        $users = User::all();
        $array = [];
        $number = 1;
        foreach($users as $user){
            $orders = $user->orders;
            foreach($orders as $order){
                $products = $order->products;
                foreach($products as $key => $product){
                    $data = [
                        'name' => $user->name,
                        'address' => $user->address,
                        'email' => $user->email,
                        'ID' => $order->id,
                        'cartItems' => $products
                    ];
                    $product->data = $data;
                    if($product->pivot->status != 'processing' && $product->pivot->status != 'in-transit'){
                        unset($products[$key]);
                    }
                }
                $array = array_merge($array, array($number => $products));
            }
        }
        //return response()->json($array);
        return view('admin.delivery', compact('array'));
    }
}
