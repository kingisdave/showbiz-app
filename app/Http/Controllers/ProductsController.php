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
        $prodcats = ProductCategory::orderBy('product_category', 'asc')->get();

        $userId = Auth::user()->id;
        $products = Product::orderBy('created_at', 'desc')->get();
        $stockImages = array();
        if($products){
            $myproducts = $products->all();
            foreach($myproducts as $products){
                $stockid = $products->id;
                $stock_file = Stock::find($stockid)->stockImage;
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
            'product_description' => 'required|max:600',
        ]);
        $stockId = $request->stock_id;
        $stock = Stock::find($stockId)->first();
        $a = ProductCategory::where('product_category', $request->product_category)->first();
        $productCatId = $a->id;
        $userId = auth()->user()->id;
        $product= Product::create([
            'user_id' => $userId,
            'stock_id' => $stock->id,
            'product_name' => $stock->stock_name,
            'product_brand' => $stock->stock_brand,
            'product_quantity' => $stock->stock_quantity,
            'product_description' => $request->product_description,
            'product_price' => $stock->selling_price,
            'product_category_id' => $productCatId,
        ]);
        if($product){
            return back()->with('successMessage', 'Your image uploads is successful');
        } else {
            return back()->with('errorMessage', `<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg, jpeg, doc</div>`);
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
        //
    }
}
