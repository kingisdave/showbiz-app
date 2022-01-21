<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Stock;
use App\Models\UserAddress;

class OrdersController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except('index');
        // $this->middleware('auth')->only('index');
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $userId = auth()->user()->pluck('id')->first();
        $myOrders = array();
        $orders = auth()->user()->Order;
        // return $orders;
        if(count($orders) > 0){
            foreach($orders as $order){
                $order['userAddress'] = "";
               $user_fullname =  User::where('id', $order->buyer_id)->pluck('full_name')->first();
            //    return $order->buyer_id;
                $order['buyer_name'] = $user_fullname;
                $buyerAdd = UserAddress::where('id', $order->user_address_id)->first();
                if($buyerAdd){
                    $order['userAddress'] = $buyerAdd->street_address.", ".$buyerAdd->city_address.", ".$buyerAdd->state_address.", ".$buyerAdd->country_address; 
                }
            //    return UserAddress::where('id', $order->user_address_id)->where('user_id', $order->buyer_id)->get(); 
                array_push($myOrders, $order);  
            }
        }
        return view('pages.privates.order')->with('myOrders', $myOrders);
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
        $pendingOrder = Order::find($request->order_id);
        $pendingOrder->order_status_id = 2;
        $updatedOrder = $pendingOrder->save();
        
        if($updatedOrder){
            return back()->with('successMessage', 'You have dispatched this order!');
        } else {
            return back()->with('errorMessage', 'Warning, You can not dispatch this order!');
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
     * Update the specified resource in storage.
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
        $dispatchedOrder = Order::find($id);
        $dispatchedOrder->order_status_id = 3;
        $upOrder = $dispatchedOrder->save();
        
        if($upOrder){
            return back()->with('successMessage', 'This order has been successfully delivered!');
        } else {
            return back()->with('errorMessage', 'Warning, This order cant be delivered!');
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
        $completedOrder = Order::find($id);
        $downOrder = $completedOrder->delete();
        
        if($downOrder){
            return back()->with('successMessage', 'Order successfully removed!');
        } else {
            return back()->with('errorMessage', 'Warning, Order removal not possible!');
        }
    }
}
