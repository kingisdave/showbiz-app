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
        // if(!auth()->user())
        // Session()->flash('order.userid');
        $clientImages = array();
        // $myCarts = array();
        // return Session()->all();
        $myCarts = 0;
        $cProducts= Product::orderBy('created_at', 'desc')->get();
        
        if(Session()->has('order.stockids')){
            $mySessions = Session()->get('order.stockids');
            // $myuserId = Session()->get('order.userid');
            $orderCarts = Order::orderBy('created_at', 'desc')->get();
                            // ->where('user_id', $myuserId)
            // $myCarts->whereIn('stock_id', $mySessions);
            // if(Session()->get('order.userid')== auth()->user()){
                // return $myCarts;
                // return $mySessions;
                if(count($orderCarts) > 0){
                    $myCarts = $orderCarts->whereIn('stock_id', $mySessions);
                    $orderIds = $orderCarts->pluck('stock_id');
                    $myproducts = $cProducts->whereNotIn('id', $mySessions)->whereNotIn('id', $orderIds);
                    if($myproducts){
                        // $myproducts = $cProducts->all();
                        foreach($myproducts as $cProducts){
                            $productid = $cProducts->stock_id;
                            $stock_file = StockImage::where('stock_id', '=', $productid)->get();
                            // $stock_file = Product::find($cProducts->stock_id)->stockImage;
                            $cProducts['file'] = $stock_file;
                            array_push($clientImages, $cProducts);
                        };
                    }
                        
                    // }
    
                } else {
                    Session()->pull('order.stockids');
                    $myCartids = $orderCarts->pluck('stock_id');
                    if($cProducts){
                        $myproducts = $cProducts->whereNotIn('id', $myCartids);
                        foreach($myproducts as $cProducts){
                            $productid = $cProducts->stock_id;
                            $stock_file = StockImage::where('stock_id', $productid)->get();
                            // $stock_file = Product::find($cProducts->stock_id)->stockImage;
                            $cProducts['file'] = $stock_file;
                            array_push($clientImages, $cProducts);
                        };
                    }
                }

            // }
                
        } else {
            $myCart = Order::orderBy('created_at', 'desc')->get();
            $myCartids = $myCart->pluck('stock_id');
            if($cProducts){
                $myproducts = $cProducts->whereNotIn('id', $myCartids);
                // $myproducts = $cProducts->all();
                foreach($myproducts as $cProducts){
                    $productid = $cProducts->stock_id;
                    $stock_file = StockImage::where('stock_id', $productid)->get();
                    // $stock_file = Product::find($cProducts->stock_id)->stockImage;
                    $cProducts['file'] = $stock_file;
                    array_push($clientImages, $cProducts);
                };
            }
        }
        // return $ownCarts;
        return view('pages.ecommerce')
            ->with('clientProducts', $clientImages)
            ->with('myCart', $myCarts);
    }
}
