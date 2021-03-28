<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\StockImage;
use App\Models\UserAddress;
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
        Session()->flash('order.userid', auth()->user()->id);
        $myCarts = 0;
        $stockImages = array();
        
        // return Session()->get('order.stockids');
        $userAddress = UserAddress::where('user_id', auth()->user()->id)->get();
        if(Session()->has('order.stockids')){
            $mySessions = Session()->get('order.stockids');
            $myCarts = Order::whereIn('stock_id', $mySessions)
                            ->orderBy('created_at', 'desc')->get();
            if($myCarts){
                foreach($myCarts as $myCart){
                    // $mySessions = Session()->get('order.stockids');
                    // $carts = $myCart->where('user_id', 'null')->whereIn('stock_id', $mySessions);
            
                    // if($mycarts){
                    $myCart->buyer_id = Session()->get('order.userid');
                    $myCart->save();
                    $productid = $myCart->stock_id;
                    $myProducts = Product::find($productid);
                    $stock_file = StockImage::where('stock_id', '=', $myProducts->stock_id)->get();
                    // $stock_file = Product::find($products->stock_id)->stockImage;
                    $myCart['file'] = $stock_file;
                    array_push($stockImages, $myCart);
                    // }
                }
            }
        }
        return view('pages.cart')
            ->with('myCart', $stockImages)
            ->with('carts', $myCarts)
            ->with('userAddress', $userAddress);
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
                        'user_id' => $product->user_id,
                        'stock_id' => $request->product_id,
                        'product_name' => $product->product_name,
                        'product_brand' => $product->product_brand,
                        'order_quantity' => $request->order_quantity,
                        'product_description' => $product->product_description,
                        'product_price' => $product->product_price,
                        'product_category_id' => $product->product_category_id,
                        'order_status_id' => $product->order_status_id
                    ]);
                    // $request->session()->flash('order.stockids', $request->product_id);
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
                    'user_id' => $product->user_id,
                    'stock_id' => $request->product_id,
                    'product_name' => $product->product_name,
                    'product_brand' => $product->product_brand,
                    'order_quantity' => $request->order_quantity,
                    'product_description' => $product->product_description,
                    'product_price' => $product->product_price,
                    'product_category_id' => $product->product_category_id,
                    'order_status_id' => $product->order_status_id,
                ]);
                // $request->session()->flash('order.stockids', $request->product_id);
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
        $request->session()->reflash();
        $sessStockId = $request->session()->get('order.stockids');
        
        if($sessStockId){
            $this->validate($request, [
                'buyer_id' => 'required',
                'street_address' => 'required',
                'city_address' => 'required',
                'state_address' => 'required',
                'country_address' => 'required',
                'zip_code' => 'required|min:1',
            ]);
    
            $myUserAdd = UserAddress::updateOrCreate(
                ['user_id' => $request->buyer_id],
                [
                    'user_id' => $request->buyer_id, 
                    'street_address' => $request->street_address,
                    'city_address' => $request->city_address, 
                    'state_address' => $request->state_address,
                    'country_address' => $request->country_address, 
                    'zip_code' => $request->zip_code
                ]
            );
            if($myUserAdd){
                $usersAdd = UserAddress::where('user_id', $request->buyer_id)->first();

                $cartSents = Order::whereIn('stock_id', $sessStockId)->get();
                if(count($cartSents) > 0){
                    foreach($cartSents as $cartSent){
                        $cartSent->user_id = $request->buyer_id;
                        $cartSent->order_status_id = 1;
                        $cartSent->user_address_id = $usersAdd->id;
                        $cartSent->save();
                    }
                }
            }
            Session()->pull('order.stockids');
            return back()->with('successMessage', 'Your order has been placed. Thanks for trusting us!');
        } else {
            return back()->with('errorMessage', `<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg, jpeg, doc</div>`);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        $pickItem = Order::find($id);
        $sessProducts = session()->pull('order.stockids', []);
        if(($key = array_search($pickItem->stock_id, $sessProducts)) !== false){
            unset($sessProducts[$key]);
        }         
        session()->put('order.stockids', $sessProducts);

        $downItem = $pickItem->delete();
        
        if($downItem){
            return redirect()->back()->with('successMessage', "Item has been removed from cart!");
        } else {
            return redirect()->back()->with('errorMessage', "Error removing Item from cart");
        }
    }
}
