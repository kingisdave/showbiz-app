@extends('layouts.app')

    @section('content')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/myckeditor.js') }}"></script>

        <div class="wrapper container-fluid" id="conta">
            @include('includes.sidenav')
            <div class="main_container">
                @include('includes.dashboardheader')
                <div class="container-fluid dashboardBorder pt-2">
                    <h3 class="fw-bolder mt-2">Order</h3>
                    {{-- <p class="small">50 orders available</p> --}}
                    @if(count($myOrders) > 0)
                        {{-- <p class="small">{{count($myCart)}} new stocks available</p> --}}
                        @foreach($myOrders as $order) 
                            @if(($order->order_status_id === 1) && (\Carbon\Carbon::now()->diffInWeeks($order->created_at) < 2) ) 
                                @if ($loop->count > 0)
                                    <p class="small">{{$loop->count}} new orders available</p>
                                    @break
                                @else
                                    <p class="small">No New stocks available yet</p>
                                    @break                        
                                @endif    
                            @endif
                        @endforeach
                    @else
                        <p class="small">No Stock available yet</p>
                    @endif
                    @if (session('successMessage'))
                        <div class="text-center">
                            <span class="alert alert-success logalert rounded-pill" role="alert">
                                {{ session('successMessage') }}
                            </span>
                        </div>
                    @endif
                    @if(session('errorMessage'))
                        <div class="mx-auto">
                            <span class="alert alert-danger logalert rounded-pill" role="alert">
                                {{ session('errorMessage') }}
                            </span>
                        </div>
                    @endif
                    <hr />
                    <div class="row shopOrdersRow bg-light">
                        <ul class="nav nav-tabs bg-info pt-2" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="allOrders-tab" data-bs-toggle="tab" data-bs-target="#allOrders" type="button" role="tab" aria-controls="allOrders" aria-selected="true">All Orders</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pending-tab" data-bs-toggle="tab" data-bs-target="#pending" type="button" role="tab" aria-controls="pending" aria-selected="false">Pending</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="dispatch-tab" data-bs-toggle="tab" data-bs-target="#dispatch" type="button" role="tab" aria-controls="dispatch" aria-selected="false">Dispatch</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="completed-tab" data-bs-toggle="tab" data-bs-target="#completed" type="button" role="tab" aria-controls="completed" aria-selected="false">Completed</button>
                            </li>
                        </ul>
                        <div class="tab-content mt-2 pt-2" id="myTabContent">
                            <div class="tab-pane fade show active" id="allOrders" role="tabpanel" aria-labelledby="allOrders-tab">
                                @if(count($myOrders) > 0)
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover small">
                                            <thead class="table-secondary">
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Item</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                                <th>Date</th>
                                                <th>Status/Action</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($myOrders as $order)
                                                    <tr class="my-1 shadow">
                                                        <td>{{$order->buyer_name}}</td>
                                                        <td>{{$order->userAddress}}</td>
                                                        <td>{{$order->product_name}}</td>
                                                        <td>{{$order->order_quantity}}</td>
                                                        <td>{{$order->product_price}}</td>
                                                        <td>{{$order->created_at}}</td>
                                                        <td>
                                                            @if ($order->order_status_id === 2)
                                                                <small class="text-success">Dispatch<small>
                                                                <button class="btn btn-sm btn-outline-primary shadow fa fa-check" title="Completed" onclick="var ddd = <?php echo 'updatetwo'.$order->id ?>; ddd.submit()"></button>
                                                                <form method="POST" id="{{'updatetwo'.$order->id}}" action="{{route('order.update', $order->id)}}" hidden>
                                                                    @csrf
                                                                    @method('PUT')
                                                                    
                                                                </form>

                                                                <button class="btn btn-sm btn-outline-danger shadow fa fa-trash" onclick="var fff = <?php echo 'deleteStock'.$order->id ?>; fff.submit()"></button>
                                                                
                                                            @elseif($order->order_status_id === 3)
                                                                <small class="text-primary">Completed<small>
                                                                <button class="btn btn-sm btn-outline-secondary shadow fa fa-circle disabled"></button>
                                                                
                                                                <button class="btn btn-sm btn-outline-danger shadow fa fa-trash" onclick="var fff = <?php echo 'deleteStock'.$order->id ?>; fff.submit()"></button>
                                                            @else
                                                                <small class="text-danger">Pending<small>
                                                                <button class="btn btn-sm btn-outline-success shadow fa fa-truck" title="Dispatch" onclick="var ggg = <?php echo 'updateone'.$order->id ?>; ggg.submit()"></button>
                                                                <form method="POST" id="{{'updateone'.$order->id}}" action="{{route('order.store')}}" hidden>
                                                                {{-- <form method="POST" id="{{'updateone'.$order->id}}" action="dashboard/store/order" hidden> --}}
                                                                    @csrf
                                                                    <input type="text" name="order_id" id="order_id" value="{{$order->id}}" hidden />
                                                                    {{-- @method('PUT') --}}
                                                                </form>
                                                                <button class="btn btn-sm btn-outline-danger shadow fa fa-trash" onclick="var fff = <?php echo 'deleteStock'.$order->id ?>; fff.submit()"></button>
                                                                {{-- <button class="btn btn-sm btn-outline-danger shadow fa fa-trash"></button> --}}
                                                                

                                                            @endif
                                                            <form method="POST" id="{{'deleteStock'.$order->id}}" action="{{route('order.destroy', $order->id)}}">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </td>
                                                    </tr>    
                                                @endforeach
                                                {{-- <tr class="my-1 shadow">
                                                    <td>Dave David</td>
                                                    <td>No 1, SQI ICT Academy, Along Yoaco, Lautech</td>
                                                    <td>Fancy Snickers</td>
                                                    <td>5</td>
                                                    <td>#330.33</td>
                                                    <td>23rd Feb, 2021</td>
                                                    <td>
                                                        <small class="text-danger">Pending<small>
                                                        <button class="btn btn-sm btn-outline-secondary shadow fa fa-circle disabled" hidden></button>
                                                        <button class="btn btn-sm btn-outline-success shadow fa fa-truck" title="Dispatch"></button>
                                                        <button class="btn btn-sm btn-outline-danger shadow fa fa-trash"></button>
                                                    </td>
                                                </tr>
                                                <tr class="my-1 shadow">
                                                    <td>Dave David</td>
                                                    <td>No 1, SQI ICT Academy, Along Yoaco, Lautech</td>
                                                    <td>Fancy Snickers</td>
                                                    <td>5</td>
                                                    <td>#330.33</td>
                                                    <td>23rd Feb, 2021</td>
                                                    <td>
                                                        <small class="text-success">Dispatch<small>
                                                        <button class="btn btn-sm btn-outline-secondary shadow fa fa-circle disabled" hidden></button>
                                                        <button class="btn btn-sm btn-outline-primary shadow fa fa-check" title="Completed"></button>
                                                        <button class="btn btn-sm btn-outline-danger shadow fa fa-trash"></button>
                                                    </td>
                                                </tr> --}}
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="dispatch" role="tabpanel" aria-labelledby="dispatch-tab">
                                @if(count($myOrders) > 0)
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover small">
                                            <thead class="table-secondary">
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Item</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                                <th>Date</th>
                                                <th>Status/Action</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($myOrders as $order)
                                                    @if($order->order_status_id === 2)
                                                        <tr class="my-1 shadow">
                                                            <td>{{$order->buyer_name}}</td>
                                                            <td>{{$order->userAddress}}</td>
                                                            <td>{{$order->product_name}}</td>
                                                            <td>{{$order->order_quantity}}</td>
                                                            <td>{{$order->product_price}}</td>
                                                            <td>{{$order->created_at}}</td>
                                                            <td>
                                                                <small class="text-success">Dispatch<small>
                                                                <button class="btn btn-sm btn-outline-primary shadow fa fa-check" title="Completed" onclick="var ddd = <?php echo 'updatetwo'.$order->id ?>; ddd.submit()"></button>
                                                                <form method="POST" id="{{'updatetwo'.$order->id}}" action="{{route('order.update', $order->id)}}" hidden>
                                                                    @csrf
                                                                    @method('PUT')    
                                                                </form>

                                                                <button class="btn btn-sm btn-outline-danger shadow fa fa-trash" onclick="var fff = <?php echo 'deleteStock'.$order->id ?>; fff.submit()"></button>
                                                                
                                                                <form method="POST" id="{{'deleteStock'.$order->id}}" action="{{route('order.destroy', $order->id)}}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                            </td>
                                                        </tr> 
                                                    @else
                                                        <div class="alert alert-danger">
                                                            <span class="text-center">There are no dispatched orders</span>
                                                        </div>   
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                                @if(count($myOrders) > 0)
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover small">
                                            <thead class="table-secondary">
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Item</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                                <th>Date</th>
                                                <th>Status/Action</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($myOrders as $order)
                                                    @if($order->order_status_id === 1)
                                                        <tr class="my-1 shadow">
                                                            <td>{{$order->buyer_name}}</td>
                                                            <td>{{$order->userAddress}}</td>
                                                            <td>{{$order->product_name}}</td>
                                                            <td>{{$order->order_quantity}}</td>
                                                            <td>{{$order->product_price}}</td>
                                                            <td>{{$order->created_at}}</td>
                                                            <td>
                                                                <small class="text-danger">Pending<small>
                                                                <button class="btn btn-sm btn-outline-success shadow fa fa-truck" title="Dispatch" onclick="var ggg = <?php echo 'updateone'.$order->id ?>; ggg.submit()"></button>
                                                                <form method="POST" id="{{'updateone'.$order->id}}" action="{{route('order.store')}}" hidden>
                                                                    @csrf
                                                                    <input type="text" name="order_id" id="order_id" value="{{$order->id}}" hidden />
                                                                </form>
                                                                <button class="btn btn-sm btn-outline-danger shadow fa fa-trash" onclick="var fff = <?php echo 'deleteStock'.$order->id ?>; fff.submit()"></button>
                                                                
                                                                <form method="POST" id="{{'deleteStock'.$order->id}}" action="{{route('order.destroy', $order->id)}}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @else
                                                        <div class="alert alert-danger">
                                                            <span class="text-center">There are no pending orders</span>
                                                        </div>
                                                    @endif
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                                @if(count($myOrders) > 0)
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover small">
                                            <thead class="table-secondary">
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Item</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                                <th>Date</th>
                                                <th>Status/Action</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($myOrders as $order)
                                                    @if($order->order_status_id === 3)
                                                        <tr class="my-1 shadow">
                                                            <td>{{$order->buyer_name}}</td>
                                                            <td>{{$order->userAddress}}</td>
                                                            <td>{{$order->product_name}}</td>
                                                            <td>{{$order->order_quantity}}</td>
                                                            <td>{{$order->product_price}}</td>
                                                            <td>{{$order->created_at}}</td>
                                                            <td>    
                                                                <small class="text-primary">Completed<small>
                                                                <button class="btn btn-sm btn-outline-secondary shadow fa fa-circle disabled"></button>
                                                                
                                                                <button class="btn btn-sm btn-outline-danger shadow fa fa-trash" onclick="var fff = <?php echo 'deleteStock'.$order->id ?>; fff.submit()"></button>
                                                                
                                                                <form method="POST" id="{{'deleteStock'.$order->id}}" action="{{route('order.destroy', $order->id)}}">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @else
                                                        <div class="alert alert-danger">
                                                            <span class="text-center">There are no completed orders</span>
                                                        </div>
                                                    @endif    
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer details -->
                @include('includes.footer')
            </div>
        </div>
        <script>
            const previewMyFile = function(e) {
                const mailHeaderImage = document.getElementById('mailHeaderImage');
                mailHeaderImage.src = URL.createObjectURL(event.target.files[0]);
                mailHeaderImage.onload = function() {
                    URL.revokeObjectURL(mailHeaderImage.src) // free memory
                }
            };
            
        </script>
    @endsection