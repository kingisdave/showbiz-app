<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\StockImage;
use App\Models\Order;

class PagesController extends Controller
{
    public function welcome()
    {
        return view("pages.welcome");
    }
    public function contact()
    {
        return view("pages.welcome");
    }
    public function services()
    {
        return view("pages.welcome");
    }
    public function shops()
    {
        
        $cProducts= Product::orderBy('created_at', 'desc')->get();
        $myCart = Order::all();
        // $sumCart = $myCart->sum('product_price');
        // return $sumCart;
        $clientImages = array();
        // return $products;
        if($cProducts){
            $myproducts = $cProducts->all();
            foreach($myproducts as $cProducts){
                $productid = $cProducts->stock_id;
                $stock_file = StockImage::where('stock_id', '=', $productid)->get();
                // $stock_file = Product::find($cProducts->stock_id)->stockImage;
                $cProducts['file'] = $stock_file;
                array_push($clientImages, $cProducts);
            };
        }
        return view('pages.ecommerce')
            ->with('clientProducts', $clientImages)
            ->with('myCart', $myCart);
    }
}
