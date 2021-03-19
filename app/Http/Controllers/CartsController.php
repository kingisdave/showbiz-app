<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\StockImage;
use Illuminate\Contracts\Session\Session;

class CartsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('store');
        // $this->middleware('auth')->only('index');
        // $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Order::orderBy('created_at', 'desc')->get();

        // $products = Product::where('user_id', $user_id)
        //                 ->orderBy('created_at', 'desc')->get();
        $stockImages = array();
        if($carts){
            $mycarts = $carts->all();
            foreach($mycarts as $carts){
                $productid = $carts->stock_id;
                $stock_file = StockImage::where('stock_id', '=', $productid)->get();
                // $stock_file = Product::find($products->stock_id)->stockImage;
                $carts['file'] = $stock_file;
                array_push($stockImages, $carts);
            };
        }
        // $myCart = Order::all();
        return view('pages.cart')
            ->with('myCart', $stockImages)
            ->with('carts', $carts);
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
        $productId = $request->product_id;
        // $request->session()->pull('order.stockids', $request->product_id);
        // $mytoken = $request->session()->get('order.stockids');
        //     return $mytoken;
        if($request->session()->has('order.stockids')){
            $mytoken = $request->session()->get('order.stockids');
        
            if(in_array($productId,$mytoken)){
                return back()->with('errorMessage', 'You can not add same products');
            }else {
                
                $this->validate($request, [
                    'product_id' => 'required',
                    'order_quantity' => 'required',
                ]);
                
                $productId = $request->product_id;
                $product = Product::find($productId);
                
                if($product){
                    Order::create([
                        'stock_id' => $request->product_id,
                        'product_name' => $product->product_name,
                        'product_brand' => $product->product_brand,
                        'order_quantity' => $request->order_quantity,
                        'product_description' => $product->product_description,
                        'product_price' => $product->product_price,
                        'product_category_id' => $product->product_category_id,
                        'order_status_id' => $product->order_status_id,
                        'order_token' => $request->_token,
                    ]);
                    $request->session()->push('order.stockids', $request->product_id);

                    return back()->with('successMessage', 'Item has been added into your cart');
                } else {
                    return back()->with('errorMessage', `<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg, jpeg, doc</div>`);
                }
            }
        } else {
            
            $this->validate($request, [
                'product_id' => 'required',
                'order_quantity' => 'required',
            ]);
            
            $productId = $request->product_id;
            $product = Product::find($productId);
            
            if($product){
                Order::create([
                    'stock_id' => $request->product_id,
                    'product_name' => $product->product_name,
                    'product_brand' => $product->product_brand,
                    'order_quantity' => $request->order_quantity,
                    'product_description' => $product->product_description,
                    'product_price' => $product->product_price,
                    'product_category_id' => $product->product_category_id,
                    'order_status_id' => $product->order_status_id,
                    'order_token' => $request->_token,
                ]);
                $request->session()->push('order.stockids', $request->product_id);

                return back()->with('successMessage', 'Item has been added into your cart');
            } else {
                return back()->with('errorMessage', `<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg, jpeg, doc</div>`);
            }
        }
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
        // 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    //     $request->session()->pull('order.stockids', $id);
    // $mytoken = $request->session()->get('order.stockids');
    //     return $mytoken;   
        $pickItem = Order::find($id);
        $products = session()->pull('order.stockids', []);
        
        if($key = array_search($pickItem->stock_id, $products) !== false){
            unset($products[$key]);
        }         
        session()->put('order.stockids', $products);
        if($pickItem){
        }
        $downItem = $pickItem->delete();
        if($downItem){
            return redirect()->back()->with('successMessage', "Item has been removed from cart!");
        } else {
            return redirect()->back()->with('errorMessage', "Error removing Item from cart");
        }
    }
}
