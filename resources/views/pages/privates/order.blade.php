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
                                                <tr class="my-1 shadow">
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
                                                </tr>
                                                <tr class="my-1 shadow">
                                                    <td>Dave David</td>
                                                    <td>No 1, SQI ICT Academy, Along Yoaco, Lautech</td>
                                                    <td>Fancy Snickers</td>
                                                    <td>5</td>
                                                    <td>#330.33</td>
                                                    <td>23rd Feb, 2021</td>
                                                    <td>
                                                        <small class="text-primary">Completed<small>
                                                        <button class="btn btn-sm btn-outline-secondary shadow fa fa-circle disabled"></button>
                                                        <button class="btn btn-sm btn-outline-primary shadow fa fa-check" hidden title="Completed"></button>
                                                        <button class="btn btn-sm btn-outline-danger shadow fa fa-trash"></button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="dispatch" role="tabpanel" aria-labelledby="dispatch-tab">
                                <div class="table-responsive ">
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
                                        <tbody class="">
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
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
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
                                        <tbody class="">
                                            <tr class="my-1 shadow">
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
                                                    <small class="text-danger">Pending<small>
                                                    <button class="btn btn-sm btn-outline-secondary shadow fa fa-circle disabled" hidden></button>
                                                    <button class="btn btn-sm btn-outline-success shadow fa fa-truck" title="Dispatch"></button>
                                                    <button class="btn btn-sm btn-outline-danger shadow fa fa-trash"></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                                <div class="table-responsive ">
                                    <table class="table table-striped table-hover  small">
                                        <thead class="table-secondary">
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Date</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody class="">
                                            <tr class="my-1 shadow">
                                                <td>Dave David</td>
                                                <td>No 1, SQI ICT Academy, Along Yoaco, Lautech</td>
                                                <td>Fancy Snickers</td>
                                                <td>5</td>
                                                <td>#330.33</td>
                                                <td>23rd Feb, 2021</td>
                                                <td>
                                                    <small class="text-primary">Completed<small>
                                                    <button class="btn btn-sm btn-outline-secondary shadow fa fa-circle disabled"></button>
                                                    <button class="btn btn-sm btn-outline-primary shadow fa fa-check" hidden></button>
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
                                                    <small class="text-primary">Completed<small>
                                                    <button class="btn btn-sm btn-outline-secondary shadow fa fa-circle disabled"></button>
                                                    <button class="btn btn-sm btn-outline-primary shadow fa fa-check" hidden></button>
                                                    <button class="btn btn-sm btn-outline-danger shadow fa fa-trash"></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        {{-- @if(count($myblogs)>0)
                            @foreach ($myblogs as $myblog)
                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    
                                    <div class="card border-0 shadow m-1">
                                        <div class="d-flex dashboardBlogs pt-1 pe-2 m-1">
                                            <img src="/storage/blogs/{{$myblog->blogimage}}" alt="{{$myblog->blogimage}}" class="img-fluid ms-1 me-3" style="width:100px; height: 80px" />
                                            <p class=""><a href="/dashboard/blog/{{$myblog->id}}" class="text-reset"><strong>{{$myblog->blog_title}}</strong></a>
                                                <small class="ms-2"><i class="">12:59 Feb 19, 2016</i></small>
                                            </p>
                                            <p class="ms-auto"><span class="btn btn-sm btn-outline-danger" onclick="var a = <?php echo 'deleting'.$myblog->id ?>; a.submit() ">Delete</span></p>
                                            <form method="POST" id="{{'deleting'.$myblog->id}}" action="{{route('blog.destroy', $myblog->id)}}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        @else
                            <div class="alert alert-danger logalert rounded-pill" role="alert">
                                You have no blog yet
                            </div>
                        @endif --}}
                        
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
            // $(document).ready(function() {
            //     $('#logger').submit(function(e) {
            //         e.preventDefault();
            //         if (email.value=="" || password.value=="") {
            //             $('#aler').fadeIn(1000).fadeOut(4000);
            //             aler.hidden=false;
            //             logerror.hidden = true;
            //             return;
            //         }
            //         loader.hidden=false;
            //         $.ajax({
            //             type: "POST",
            //             url: 'functions.php',
            //             data: $(this).serialize(),
            //             success: function(response)
            //             {
            //                 var jsonData = JSON.parse(response);
            //                 // user is logged in successfully in the backend, now lets redirect
            //                 if (jsonData.success == "1") {
            //                     location.href = 'usernew.php';
            //                 } else {
            //                     logerror.hidden = false;
            //                     aler.hidden=true;
            //                     loader.hidden=true;

            //                 }
            //             }
            //         })
            //     });
            // })
        </script>
    @endsection