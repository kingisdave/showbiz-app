<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StockImage;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Storage;

class StocksController extends Controller
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
        $stocks = Stock::orderBy('created_at', 'desc')->get();
        $stockImages = array();
        if($stocks){
            $mystocks = $stocks->all();
            foreach($mystocks as $stocks){
                $stockid = $stocks->id;
                $stock_file = Stock::find($stockid)->stockImage;
                $stocks['file'] = $stock_file;
                array_push($stockImages, $stocks);
            };
        }

            return view('pages.privates.stock')
                    ->with('stocks', $stockImages)
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
            'stock_name' => 'required',
            'stock_brand' => 'required',
            'stock_quantity' => 'required|min:1',
            'cost_price' => 'required',
            'selling_price' => 'required',
            'product_category' => 'required',
            // 'expiry_date'=>'required',
            'stockImage'=>'required',
        ]);
        if($request->hasFile('stockImage'))
        {
            $imageExt=['pdf','jpg','png', 'jpeg', 'gif'];
            $files = $request->file('stockImage');
            foreach($files as $file){
                $filename = $file->getClientOriginalName();
                $exten = $file->getClientOriginalExtension();
                $checked=in_array($exten,$imageExt);
                //dd($checked);
                if($checked)
                {
                    // $stocks= Stock::create($request->all());
                    $a = ProductCategory::where('product_category', $request->product_category)->first();
                    $productCatId = $a->id;
                    $userId = auth()->user()->id;
                    $stocks= Stock::create([
                        'user_id' => $userId,
                        'stock_name' => $request->stock_name,
                        'stock_brand' => $request->stock_brand,
                        'stock_quantity' => $request->stock_quantity,
                        'cost_price' => $request->cost_price,
                        'selling_price' => $request->selling_price,
                        'expiry_date' => $request->expiry_date,
                        'product_category_id' => $productCatId,
                    ]);
                    foreach ($request->stockImage as $photo) {
                        $filename = $photo->store('public/stockgallery');
                        StockImage::create([
                            'stock_id' => $stocks->id,
                            'stockImages' => $filename
                        ]);
                    }
                    return back()->with('successMessage', 'Your image uploads is successful');
                } else {
                    return back()->with('errorMessage', `<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg, jpeg, doc</div>`);
                }
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
        $this->validate($request, [
            'stock_name' => 'required',
            'stock_brand' => 'required',
            'stock_quantity' => 'required|min:1',
            'cost_price' => 'required',
            'selling_price' => 'required',
            'product_category' => 'required',
            // 'stockImage' => 'image'
        ]);
        $a = ProductCategory::where('product_category', $request->product_category)->first();
        $productCatId = $a->id;
        $userId = auth()->user()->id;
        $stock = Stock::find($id);
        $stock->user_id = $userId;
        $stock->stock_name = $request->stock_name;
        $stock->stock_brand = $request->stock_brand;
        $stock->stock_quantity = $request->stock_quantity;
        $stock->cost_price = $request->cost_price;
        $stock->selling_price = $request->selling_price;
        $stock->expiry_date = $request->expiry_date;
        $stock->product_category_id = $productCatId;
        $stock->save();

        if($request->hasFile('stockImage'))
        {
            $imageExt=['pdf','jpg','JPG','png','PNG','jpeg','JPEG','gif'];
            $files = $request->file('stockImage');
            $unitimg = StockImage::where('stock_id', '=', $id)->get();
            if(count($unitimg) > 0){
                foreach ($unitimg as $eachFile) {
                 
                    Storage::delete($eachFile->stockImages);
    
                    $eachFile->delete();
                }
                foreach($files as $file){
                    $filename = $file->getClientOriginalName();
                    $exten = $file->getClientOriginalExtension();
                    $checked=in_array($exten,$imageExt);
                    if($checked)
                    {
                        $filename = $file->store('public/stockgallery');
                        $stockimage = new StockImage;
                        $stockimage->stock_id = $id;
                        $stockimage->stockImages = $filename;
                        $stockimage->save();
                    }
                }
            } else {
                foreach($files as $file){
                    $filename = $file->getClientOriginalName();
                    $exten = $file->getClientOriginalExtension();
                    $checked=in_array($exten,$imageExt);
                    if($checked)
                    {
                        $filename = $file->store('public/stockgallery');
                        $stockimage = new StockImage;
                        $stockimage->stock_id = $id;
                        $stockimage->stockImages = $filename;
                        $stockimage->save();
                    }
                }
            }
            return back()->with('successMessage', 'Your image uploads is successful');
        } else {
            return back()->with('errorMessage', 'Warning! Sorry Only Upload png ,jpg , jpeg, doc');
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
        $pickStock = Stock::find($id);
        if($pickStock){
            // Storage::delete($eachFile->stockImages);
            StockImage::where('stock_id', $pickStock->id)->delete();
        }
        $downStock = $pickStock->delete();
        if($downStock){
            return redirect()->back()->with('successMessage', "Stock has been deleted");
        } else {
            return redirect()->back()->with('errorMessage', "Error updating the stock");
        }
    }
}
