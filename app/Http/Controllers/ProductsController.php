<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\StockImage;
use App\Models\ProductCategory;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $prodcats = ProductCategory::where('user_id', $user_id)
                                ->orderBy('product_category', 'asc')->get();

        $products = Product::where('user_id', $user_id)
                        ->orderBy('created_at', 'desc')->get();
        $stockImages = array();
        if($products){
            $myproducts = $products->all();
            foreach($myproducts as $products){
                $productid = $products->stock_id;
                $stock_file = StockImage::where('stock_id', '=', $productid)->get();
                // $stock_file = Product::find($products->stock_id)->stockImage;
                $products['file'] = $stock_file;
                array_push($stockImages, $products);
            };
        }
            return view('pages.privates.product')
                    ->with('products', $stockImages)
                    ->with('prodcats', $prodcats);
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
        $this->validate($request, [
            'stock_id' => 'required',
            'product_name' => 'required',
            'product_quantity' => 'required',
            'product_description' => 'required|max:600',
        ]);
        $stockId = $request->stock_id;
        $stock = Stock::find($stockId);
        // $userId = auth()->user()->id;
        $products= Product::where('stock_id', $stockId)->get('product_quantity');
        $stocksRem = $products->sum('product_quantity');
        $myStock = $stock->stock_quantity - ($stocksRem + $request->product_quantity);
        
        if($myStock >= 0){
            Product::create([
                'user_id' => $stock->user_id,
                'stock_id' => $request->stock_id,
                'product_name' => $request->product_name,
                'product_brand' => $stock->stock_brand,
                'product_quantity' => $request->product_quantity,
                'product_description' => $request->product_description,
                'product_price' => $stock->selling_price,
                'product_category_id' => $stock->product_category_id,
                'order_status_id' => 0,
            ]);
            $stock->switch_product = 1;
            $stock->save();
            // if($product){
                return back()->with('successMessage', 'Your Product has been updated');
            // } else {
                // return back()->with('errorMessage', `<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg, jpeg, doc</div>`);
            // }
        } else {
            return back()->with('errorMessage', 'Not yet updated');
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
        // $products= Product::where('stock_id', $stockId)->get('product_quantity');
        // $stocksRem = $products->sum('product_quantity');
        // $myStock = $stock->stock_quantity - ($stocksRem + $request->product_quantity);

        $singleProduct = Product::find($id);
        $addQuantity = $singleProduct->product_quantity;
        if($singleProduct){

            $upProduct = Stock::where('id', $singleProduct->stock_id)->first();
            // $upProduct->stock_quantity += $addQuantity;
            $upProduct->switch_product = 0;
            $downProduct = $upProduct->save();
            
            if($downProduct){
                $singleProduct->delete();
            }
            return redirect()->back()->with('successMessage', "Product has been removed");
        } else {
            return redirect()->back()->with('errorMessage', "Error removing the product");
        }
    }
}
