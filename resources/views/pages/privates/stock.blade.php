@extends('layouts.app')

    @section('content')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/myckeditor.js') }}"></script>

        <div class="wrapper container-fluid" id="conta">
            @include('includes.sidenav')
            <div class="main_container">
                @include('includes.dashboardheader')
                <div class="container-fluid dashboardBorder pt-2">
                    <h4 class="fw-bolder mt-2">Stock</h4>
                    @if(count($stocks) > 0)
                        {{-- <p class="small">{{count($stocks)}} new stocks available</p> --}}
                        @foreach($stocks as $stock)
                            @if(\Carbon\Carbon::now()->diffInWeeks($stock->created_at) < 2 )
                                @if ($loop->count > 0)
                                    <p class="small">{{$loop->count}} new stocks available</p>
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
                            <span class="alert alert-success logalert rounded-pill small" role="alert">
                                <small>{{ session('successMessage') }}</small>
                            </span>
                        </div>
                    @endif
                    @if(session('errorMessage'))
                        <div class="mx-auto">
                            <span class="alert alert-danger logalert rounded-pill small" role="alert">
                                <small>{{ session('errorMessage') }}</small>
                            </span>
                        </div>
                    @endif
                    <hr />
                    <div class="row shopOrdersRow bg-light">
                        <ul class="nav nav-tabs bg-info pt-2 small orderstype" id="myTab" role="tablist">
                            <li class="nav-item nitems" role="presentation">
                                <button class="nav-link active" id="allStocks-tab" data-bs-toggle="tab" data-bs-target="#allStocks" type="button" role="tab" aria-controls="allStocks" aria-selected="true">All Stocks</button>
                            </li>
                            <li class="nav-item nitems" role="presentation">
                                <button class="nav-link" id="newStock-tab" data-bs-toggle="tab" data-bs-target="#newStock" type="button" role="tab" aria-controls="newStock" aria-selected="false">New</button>
                            </li>
                            <li class="nav-item nitems" role="presentation">
                                <button class="nav-link" id="oldStock-tab" data-bs-toggle="tab" data-bs-target="#oldStock" type="button" role="tab" aria-controls="oldStock" aria-selected="false">Old</button>
                            </li>
                            <li class="nav-item nitems" role="presentation">
                                <button class="nav-link" id="expiredProduct-tab" data-bs-toggle="tab" data-bs-target="#expiredProduct" type="button" role="tab" aria-controls="expiredProduct" aria-selected="false">Expired</button>
                            </li>
                        </ul>
                        <div class="tab-content mt-3 pt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="allStocks" role="tabpanel" aria-labelledby="allStocks-tab">
                                <div class="row">
                                    @if(count($stocks) > 0)
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped text-center table-hover align-middle shadow">
                                                    <thead class="table-dark">
                                                        <th></th>
                                                        <th>Image</th>
                                                        <th>Name</th>
                                                        <th>Total Qty</th>
                                                        <th>Rem. Qty</th>
                                                        <th>Cost Price</th>
                                                        <th>Selling Price</th>
                                                        <th>Product %</th>
                                                        <th>Operations</th>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($stocks as $stock)
                                                            <tr class="stocksRow">
                                                                <td>
                                                                    @if(\Carbon\Carbon::now()->diffInWeeks($stock->created_at) > 2 )
                                                                        <span class="small bg-primary text-light p-1">Old</span>
                                                                    @else
                                                                        <span class="small bg-danger text-light p-1">New</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <img src="/storage/{{substr($stock->file[0]->stockImages, 7)}}" class="mx-auto"
                                                                        alt="{{substr($stock->file[0]->stockImages, 7)}}" height="50" width="50">
                                                                </td>
                                                                <td><a href="#" class="text-dark" data-bs-toggle="modal" data-bs-target="#stockDetailsModal{{$stock->id}}" data-bs-whatever="@productOne">
                                                                    <h6 class="fw-bold">{{$stock->stock_name}}</h6></a>
                                                                </td>
                                                                <td>
                                                                    <span class="small">{{$stock->stock_quantity}}</span>
                                                                </td>
                                                                <td>
                                                                    @if($stock->proRem)
                                                                        <span class="small">{{$stock->stock_quantity - $stock->proRem}}</span>
                                                                    @else
                                                                        <span class="small">{{$stock->stock_quantity}}</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <span class="small">$ {{$stock->cost_price}}</span>
                                                                </td>
                                                                <td>
                                                                    <span class="small">$ {{$stock->selling_price}}</span>
                                                                </td>
                                                                @if(($stock->stock_quantity - $stock->proRem) > 0)
                                                                    <td class="text-danger">
                                                                        {{round(($stock->proRem / $stock->stock_quantity) * 100, 2) }} %
                                                                    </td>
                                                                    <td>
                                                                        <button class="btn btn-success text-white shadow" data-bs-toggle="modal" data-bs-target="#addProductModal{{$stock->id}}" title="Add To Product">
                                                                            <i class="fa fa-arrow-right me-2"></i>Add to Products
                                                                        </button>
                                                                    </td>
                                                                @else
                                                                    <td class="text-success">
                                                                        {{round(($stock->proRem / $stock->stock_quantity) * 100, 2) }} %
                                                                        {{-- <i class="fa fa-check-square-o fa-2x ms-2 text-success"></i> --}}
                                                                    </td>
                                                                    <td>
                                                                        <span class="bg-secondary text-light p-1">Products</span>
                                                                    </td>
                                                                @endif
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            {{-- <a href="#" data-bs-toggle="modal" data-bs-target="#stockDetailsModal{{$stock->id}}" data-bs-whatever="@productOne">
                                                <div class="card mx-2 mb-4 shadow productCard d-flex align-self-end">
                                                    <img src="/storage/{{substr($stock->file[0]->stockImages, 7)}}" class="mx-auto"
                                                        alt="{{substr($stock->file[0]->stockImages, 7)}}">
                                                    <div class="card-img-overlay d-flex align-items-end padOff">
                                                        <div class="infoTextBelow belowText mx-auto small">
                                                            <h6 class="fw-bold text-center">{{$stock->stock_name}}
                                                                <i class="fa fa-check-square-o ms-2 text-success"></i>
                                                            </h6>
                                                            <p class="clearfix">
                                                                <span class="small float-start">$ {{$stock->selling_price}}</span>
                                                                @if(\Carbon\Carbon::now()->diffInWeeks($stock->created_at) > 2 )
                                                                    <span class="small float-end bg-primary p-1">Old</span>
                                                                @else
                                                                    <span class="small float-end bg-danger p-1">New</span>
                                                                @endif
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a> --}}
                                        </div>
                                    @else
                                        <div class="text-center">
                                            <span class="alert alert-danger text-center">You have no stock yet!</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="newStock" role="tabpanel" aria-labelledby="newStock-tab">
                                <div class="row">
                                    @if(count($stocks) > 0)
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped text-center table-hover align-middle shadow">
                                                    <thead class="table-dark">
                                                        <th></th>
                                                        <th>Image</th>
                                                        <th>Name</th>
                                                        <th>Total Qty</th>
                                                        <th>Rem. Qty</th>
                                                        <th>Cost Price</th>
                                                        <th>Selling Price</th>
                                                        <th>Product %</th>
                                                        <th>Operations</th>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($stocks as $stock)
                                                            @if(\Carbon\Carbon::now()->diffInWeeks($stock->created_at) < 2 )
                                                                <tr class="stocksRow">
                                                                    <td>
                                                                        <span class="small bg-danger p-1">New</span>
                                                                    </td>
                                                                    <td>
                                                                        <img src="/storage/{{substr($stock->file[0]->stockImages, 7)}}" class="mx-auto"
                                                                            alt="{{substr($stock->file[0]->stockImages, 7)}}" height="50" width="50">
                                                                    </td>
                                                                    <td><a href="#" class="text-dark" data-bs-toggle="modal" data-bs-target="#stockDetailsModal{{$stock->id}}" data-bs-whatever="@productOne">
                                                                        <h6 class="fw-bold">{{$stock->stock_name}}</h6></a>
                                                                    </td>
                                                                    <td>
                                                                        <span class="small">{{$stock->stock_quantity}}</span>
                                                                    </td>
                                                                    <td>
                                                                        @if($stock->proRem)
                                                                            <span class="small">{{$stock->stock_quantity - $stock->proRem}}</span>
                                                                        @else
                                                                            <span class="small">{{$stock->stock_quantity}}</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <span class="small">$ {{$stock->cost_price}}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="small">$ {{$stock->selling_price}}</span>
                                                                    </td>
                                                                    @if(($stock->stock_quantity - $stock->proRem) > 0)
                                                                        <td class="text-danger">
                                                                            {{round(($stock->proRem / $stock->stock_quantity) * 100, 2) }} %
                                                                        </td>
                                                                        <td>
                                                                            <button class="btn btn-success text-white shadow" data-bs-toggle="modal" data-bs-target="#addProductModal{{$stock->id}}" title="Add To Product">
                                                                                <i class="fa fa-arrow-right me-2"></i>Add to Products
                                                                            </button>
                                                                        </td>
                                                                    @else
                                                                        <td class="text-success">
                                                                            {{round(($stock->proRem / $stock->stock_quantity) * 100, 2) }} %
                                                                            {{-- <i class="fa fa-check-square-o fa-2x ms-2 text-success"></i> --}}
                                                                        </td>
                                                                        <td>
                                                                            <span class="bg-secondary text-light p-1">Products</span>
                                                                        </td>
                                                                    @endif
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        {{-- @foreach($stocks as $stock)
                                            @if(\Carbon\Carbon::now()->diffInWeeks($stock->created_at) < 2 )
                                                <div class="col-md-3 col-sm-4 col-12 newPcard">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#stockDetailsModal{{$stock->id}}" data-bs-whatever="@productOne">
                                                        <div class="card mx-2 mb-4 shadow productCard d-flex align-self-end">
                                                            <img src="/storage/{{substr($stock->file[0]->stockImages, 7)}}" class="mx-auto"
                                                                alt="{{substr($stock->file[0]->stockImages, 7)}}">
                                                            <div class="card-img-overlay d-flex align-items-end padOff">
                                                                <div class="infoTextBelow belowText mx-auto small">
                                                                    <h6 class="fw-bold text-center">{{$stock->stock_name}}</h6>
                                                                    <p class="clearfix">
                                                                        <span class="small float-start">$ {{$stock->selling_price}}</span>
                                                                        <span class="small float-end bg-danger p-1">New</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach --}}
                                    @else
                                        <div class="text-center">
                                            <span class="alert alert-danger text-center">You have no New stock yet!</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="oldStock" role="tabpanel" aria-labelledby="oldStock-tab">
                                <div class="row">
                                    @if(count($stocks) > 0)
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped text-center table-hover align-middle shadow">
                                                    <thead class="table-dark">
                                                        <th></th>
                                                        <th>Image</th>
                                                        <th>Name</th>
                                                        <th>Total Qty</th>
                                                        <th>Rem. Qty</th>
                                                        <th>Cost Price</th>
                                                        <th>Selling Price</th>
                                                        <th>Product %</th>
                                                        <th>Operations</th>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($stocks as $stock)
                                                            @if(\Carbon\Carbon::now()->diffInWeeks($stock->created_at) > 2 )
                                                                <tr class="stocksRow">
                                                                    <td>
                                                                        <span class="small bg-primary p-1">Old</span>
                                                                    </td>
                                                                    <td>
                                                                        <img src="/storage/{{substr($stock->file[0]->stockImages, 7)}}" class="mx-auto"
                                                                            alt="{{substr($stock->file[0]->stockImages, 7)}}" height="50" width="50">
                                                                    </td>
                                                                    <td><a href="#" class="text-dark" data-bs-toggle="modal" data-bs-target="#stockDetailsModal{{$stock->id}}" data-bs-whatever="@productOne">
                                                                        <h6 class="fw-bold">{{$stock->stock_name}}</h6></a>
                                                                    </td>
                                                                    <td>
                                                                        <span class="small">{{$stock->stock_quantity}}</span>
                                                                    </td>
                                                                    <td>
                                                                        @if($stock->proRem)
                                                                            <span class="small">{{$stock->stock_quantity - $stock->proRem}}</span>
                                                                        @else
                                                                            <span class="small">{{$stock->stock_quantity}}</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <span class="small">$ {{$stock->cost_price}}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="small">$ {{$stock->selling_price}}</span>
                                                                    </td>
                                                                    @if(($stock->stock_quantity - $stock->proRem) > 0)
                                                                        <td class="text-danger">
                                                                            {{round(($stock->proRem / $stock->stock_quantity) * 100, 2) }} %
                                                                        </td>
                                                                        <td>
                                                                            <button class="btn btn-success text-white shadow" data-bs-toggle="modal" data-bs-target="#addProductModal{{$stock->id}}" title="Add To Product">
                                                                                <i class="fa fa-arrow-right me-2"></i>Add to Products
                                                                            </button>
                                                                        </td>
                                                                    @else
                                                                        <td class="text-success">
                                                                            {{round(($stock->proRem / $stock->stock_quantity) * 100, 2) }} %
                                                                            {{-- <i class="fa fa-check-square-o fa-2x ms-2 text-success"></i> --}}
                                                                        </td>
                                                                        <td>
                                                                            <span class="bg-secondary text-light p-1">Products</span>
                                                                        </td>
                                                                    @endif
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        {{-- @foreach($stocks as $stock)
                                            @if(\Carbon\Carbon::now()->diffInWeeks($stock->created_at) > 2 )
                                                <div class="col-md-3 col-sm-4 col-12 newPcard">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#stockDetailsModal{{$stock->id}}" data-bs-whatever="@productOne">
                                                        <div class="card mx-2 mb-4 shadow productCard d-flex align-self-end">
                                                            <img src="/storage/{{substr($stock->file[0]->stockImages, 7)}}" class="mx-auto"
                                                                alt="{{substr($stock->file[0]->stockImages, 7)}}">
                                                            <div class="card-img-overlay d-flex align-items-end padOff">
                                                                <div class="infoTextBelow belowText mx-auto small">
                                                                    <h6 class="fw-bold text-center">{{$stock->stock_name}}</h6>
                                                                    <p class="clearfix">
                                                                        <span class="small float-start">$ {{$stock->selling_price}}</span>
                                                                        <span class="small float-end bg-primary p-1">Old</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach --}}
                                    @else
                                        <div class="text-center">
                                            <span class="alert alert-danger text-center">You have no Old stock yet!</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="tab-pane fade" id="expiredProduct" role="tabpanel" aria-labelledby="expiredProduct-tab">
                                <div class="row">
                                    @if(count($stocks) > 0)
                                        <div class="col-12">
                                            <div class="table-responsive">
                                                <table class="table table-striped text-center table-hover align-middle shadow">
                                                    <thead class="table-dark">
                                                        <th></th>
                                                        <th>Image</th>
                                                        <th>Name</th>
                                                        <th>Total Qty</th>
                                                        <th>Rem. Qty</th>
                                                        <th>Cost Price</th>
                                                        <th>Selling Price</th>
                                                        <th>Product %</th>
                                                        <th>Operations</th>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($stocks as $stock)
                                                            @if(\Carbon\Carbon::now()->diffInDays($stock->expiry_date) < 1 )
                                                                <tr class="stocksRow">
                                                                    <td>
                                                                        <span class="small bg-secondary p-1">Expired</span>
                                                                    </td>
                                                                    <td>
                                                                        <img src="/storage/{{substr($stock->file[0]->stockImages, 7)}}" class="mx-auto"
                                                                            alt="{{substr($stock->file[0]->stockImages, 7)}}" height="50" width="50">
                                                                    </td>
                                                                    <td><a href="#" class="text-dark" data-bs-toggle="modal" data-bs-target="#stockDetailsModal{{$stock->id}}" data-bs-whatever="@productOne">
                                                                        <h6 class="fw-bold">{{$stock->stock_name}}</h6></a>
                                                                    </td>
                                                                    <td>
                                                                        <span class="small">{{$stock->stock_quantity}}</span>
                                                                    </td>
                                                                    <td>
                                                                        @if($stock->proRem)
                                                                            <span class="small">{{$stock->stock_quantity - $stock->proRem}}</span>
                                                                        @else
                                                                            <span class="small">{{$stock->stock_quantity}}</span>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        <span class="small">$ {{$stock->cost_price}}</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="small">$ {{$stock->selling_price}}</span>
                                                                    </td>
                                                                    <td>
                                                                        <i class="fa fa-check-square-o fa-2x ms-2 text-success"></i>
                                                                    </td>
                                                                    <td>
                                                                        <button class="float-end btn btn-outline-danger" onclick="var bb = <?php echo 'deleteStock'.$stock->id ?>; if(confirm('Are you sure you want to delete this stock? If not, press Cancel')){ bb.submit() }"><i class="fa fa-trash me-2"></i>Delete</button>
                                                                        <form method="POST" id="{{'deleteStock'.$stock->id}}" action="{{route('stock.destroy', $stock->id)}}">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        {{-- @foreach($stocks as $stock)
                                            @if(\Carbon\Carbon::now()->diffInDays($stock->expiry_date) < 1 )
                                                <div class="col-md-3 col-sm-4 col-12 newPcard">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#stockDetailsModal{{$stock->id}}" data-bs-whatever="@productOne">
                                                        <div class="card mx-2 mb-4 shadow productCard d-flex align-self-end">
                                                            <img src="/storage/{{substr($stock->file[0]->stockImages, 7)}}" class="mx-auto"
                                                                alt="{{substr($stock->file[0]->stockImages, 7)}}">
                                                            <div class="card-img-overlay d-flex align-items-end padOff">
                                                                <div class="infoTextBelow belowText mx-auto small">
                                                                    <h6 class="fw-bold text-center">{{$stock->stock_name}}</h6>
                                                                    <p class="clearfix">
                                                                        <span class="small float-start">$ {{$stock->selling_price}}</span>
                                                                        <span class="small float-end bg-secondary p-1">Expired</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach --}}
                                    @else
                                        <div class="text-center">
                                            <span class="alert alert-danger text-center">You have no stock yet!</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Click to add New product button -->
                    <div class="fixed-bottom mb-3 me-4 p-4">
                        <button class="btn btn-primary rounded-circle float-end p-3 shadow" data-bs-toggle="modal" data-bs-target="#addStockModal" title="Add Stock Button">
                            <span class="fa fa-plus"></span>
                        </button>
                    </div>

                    <!-- The Add Stock details Modal -->
                    <form method="POST" action="stock" class="clearfix" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal fade productDetails" id="addStockModal" tabindex="-1" aria-labelledby="addStockModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <h5 class="fw-bold">Add New Stock</h5>
                                        <div class="container-fliud">

                                            <div class="form-group mt-1 mb-2">
                                                <select name="product_category" id="product_category" class="form-control @error('product_category') is-invalid @enderror" required>
                                                    <option value="">--Choose a Category--</option>
                                                    @if(count($prodcats) > 0)
                                                        @foreach($prodcats as $category)
                                                            <option value="{{$category->product_category}}">{{$category->product_category}}</option>
                                                        @endforeach
                                                    @else
                                                        <option value="">No Category yet</option>
                                                    @endif
                                                </select>
                                                @error('product_category')
                                                <small class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                            </div>
                                            <small>Product photos (can attach more than one) for display</small>
                                            <div class="card mt-2 border-0 imagesUploadCard mt-1 p-4 mx-auto shadow">
                                                <input type="file" name="stockImage[]" id="stockImages" multiple class="form-control @error('stockImage') is-invalid @enderror"
                                                    required/>
                                                @error('stockImage')
                                                    <small class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                                <div class="row justify-content-center" id="my_preview"></div>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="stockName">Stock Name</label>
                                                <input type="text" name="stock_name" id="stockName" class="form-control @error('stock_name') is-invalid @enderror"
                                                    required autocomplete="stock_name" placeholder="G-Class Benz, Lamborghini Urus, KingsGold Chain..." />
                                                @error('stock_name')
                                                    <small class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="form-group mt-2">
                                                <label for="stock_brand">Stock Brand</label>
                                                <input type="text" name="stock_brand" id="stock_brand" class="form-control @error('stock_brand') is-invalid @enderror"
                                                    required autocomplete="stock_brand" placeholder="Mercedez, Tesla, Apple..." />
                                                @error('stock_brand')
                                                    <small class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="row mt-2">
                                                <div class="form-group col-6">
                                                    <label for="stock_quantity">Stock Quantity</label>
                                                    <input type="number" name="stock_quantity" id="stock_quantity" class="form-control @error('stock_quantity') is-invalid @enderror"
                                                        required autocomplete="stock_quantity" placeholder="100000, 500, 90, 2..." />
                                                    @error('stock_quantity')
                                                        <small class="invalid-feedback" role="alert">
                                                            {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="expiry_date">Expiry Date</label>
                                                    <input type="date" name="expiry_date" id="expiry_date" class="form-control @error('expiry_date') is-invalid @enderror"
                                                        required autocomplete="expiry_date" placeholder="01-March-2100" />
                                                    @error('expiry_date')
                                                        <small class="invalid-feedback" role="alert">
                                                            {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mt-2">
                                                <div class="form-group col-6">
                                                    <label for="cost_price">Cost Price</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">$</span>
                                                        <input type="number" name="cost_price" id="cost_price" class="form-control @error('cost_price') is-invalid @enderror"
                                                            required autocomplete="cost_price" placeholder="9,000,000,000.00" />
                                                    </div>
                                                    @error('cost_price')
                                                        <small class="invalid-feedback" role="alert">
                                                            {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-6">
                                                    <label for="selling_price">Selling Price</label>
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text">$</span>
                                                        <input type="number" name="selling_price" id="selling_price" class="form-control @error('selling_price') is-invalid @enderror"
                                                            required autocomplete="selling_price" placeholder="9,000,000,000.00" />
                                                    </div>
                                                    @error('selling_price')
                                                        <small class="invalid-feedback" role="alert">
                                                            {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <div class="col-12 clearfix">
                                            <button class="float-end btn btn-primary text-white" id="imageUpload"><i class="fa warehouse me-2"></i>Add to Stock</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- The Each Stock details Modal -->
                    @if(count($stocks) > 0)
                        @foreach($stocks as $stock)
                            <div class="modal fade productDetails" id="stockDetailsModal{{$stock->id}}" tabindex="-1" aria-labelledby="stockDetailsModalLabel{{$stock->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <div class="container-fliud">
                                                <div class="card mt-2 border-0 otherTitleCard mt-1 p-4 mx-auto shadow">
                                                    <h5 class="text-white text-center">{{$stock->stock_name}}</h5>
                                                    <div class="row">
                                                        <div id="carouselExampleSlidesOnly" class="col-12 carousel slide" data-bs-ride="carousel">
                                                            <div class="carousel-inner">
                                                                <div class="carousel-item active">
                                                                    <img src="/storage/{{substr($stock->file[0]->stockImages, 7)}}"
                                                                        class="d-block w-100 rounded shadow" height="250" alt="{{substr($stock->file[0]->stockImages, 7)}}" />
                                                                </div>
                                                                @if (count($stock->file) > 1)
                                                                    <div class="carousel-item">
                                                                        <img src="/storage/{{substr($stock->file[1]->stockImages, 7)}}"
                                                                            class="d-block w-100 rounded shadow" height="250" alt="{{substr($stock->file[1]->stockImages, 7)}}" />
                                                                    </div>
                                                                @endif
                                                                @if (count($stock->file) > 2)
                                                                    <div class="carousel-item">
                                                                        <img src="/storage/{{substr($stock->file[2]->stockImages, 7)}}"
                                                                            class="d-block w-100 rounded shadow" height="250" alt="{{substr($stock->file[2]->stockImages, 7)}}" />
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-12 row my-2">
                                                            <div class="col-4">
                                                                <div class="mx-auto smallInsideModal rounded">
                                                                    <img src="/storage/{{substr($stock->file[0]->stockImages, 7)}}" class="img-thumbnail border-0 rounded shadow" alt="{{substr($stock->file[0]->stockImages, 7)}}"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                @if (count($stock->file) > 1)
                                                                    <div class="mx-auto smallInsideModal rounded">
                                                                        <img src="/storage/{{substr($stock->file[1]->stockImages, 7)}}" class="img-thumbnail border-0 rounded shadow" alt="{{substr($stock->file[1]->stockImages, 7)}}" />
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div class="col-4">
                                                                @if (count($stock->file) > 2)
                                                                    <div class="mx-auto smallInsideModal rounded">
                                                                        <img src="/storage/{{substr($stock->file[2]->stockImages, 7)}}" class="img-thumbnail border-0 rounded shadow" alt="{{substr($stock->file[2]->stockImages, 7)}}" />
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mt-2">
                                                            <h6 class="clearfix fw-bold">
                                                                <span class="float-start"><small class="small">Cost</small><br/>${{$stock->cost_price}}</span>
                                                                <span class="float-end"><small class="small">Sell</small><br/>${{$stock->selling_price}}</span>
                                                            </h6>
                                                            {{-- <h6>Product Description</h6> --}}
                                                            <p></p>
                                                            <p class="text-primary">
                                                                Review: <i class="fa fa-star text-warning"></i>
                                                                <i class="fa fa-star text-warning"></i>
                                                                <i class="fa fa-star text-warning"></i>
                                                                <i class="fa fa-star text-warning"></i>
                                                                <i class="fa fa-star text-warning"></i>
                                                                <small>5.0(40)</small>
                                                            </p>
                                                            {{-- <div class="text-center"> --}}
                                                                {{-- <button class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#addProductModal{{$stock->id}}" title="Add To Product">
                                                                    <i class="fa fa-arrow-right me-2"></i>Add to Products
                                                                </button> --}}
                                                                {{-- <button class="btn btn-success text-white" data-bs-toggle="modal" data-bs-target="#AddProductModal{{$stock->id}}" title="Add To Product">
                                                                    <i class="fa fa-arrow-right me-2" onclick="var pp = <?php echo 'makeProduct'.$stock->id ?>; pp.submit() "></i>Add to Products
                                                                </button>
                                                                <form method="POST" id="{{'makeProduct'.$stock->id}}" action="{{route('product.create', $stock->id)}}">
                                                                    @csrf
                                                                </form> --}}
                                                            {{-- </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <div class="col-12 clearfix">
                                                <button class="float-start btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#editStockModal{{$stock->id}}" title="Edit Stock">
                                                    <i class="fa fa-edit me-2"></i>Edit Stock</button>
                                                <button class="float-end btn btn-outline-danger" onclick="var bb = <?php echo 'deleteStock'.$stock->id ?>; if(confirm('Are you sure you want to delete this stock? If not, press Cancel')){ bb.submit() }"><i class="fa fa-trash me-2"></i>Delete</button>
                                                <form method="POST" id="{{'deleteStock'.$stock->id}}" action="{{route('stock.destroy', $stock->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- The Edit Stock details Modal -->
                            <form method="POST" action="{{route('stock.update', $stock->id)}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @method('PUT')
                                <div class="modal fade productDetails" id="editStockModal{{$stock->id}}" tabindex="-1" aria-labelledby="editStockModalLabel{{$stock->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <h5 class="fw-bold">Edit Your Stock</h5>
                                                <div class="container-fliud">
                                                    <div class="form-group mt-1 mb-2">
                                                        <select name="product_category" id="product_category" class="form-control @error('product_category') is-invalid @enderror" required>
                                                            @if(count($prodcats) > 0)
                                                                @foreach($prodcats as $category)
                                                                    <option value="{{$category->product_category}}">{{$category->product_category}}</option>
                                                                @endforeach
                                                            @endif
                                                            @error('product_category')
                                                                <small class="invalid-feedback" role="alert">
                                                                    {{ $message }}
                                                                </small>
                                                            @enderror
                                                        </select>
                                                    </div>
                                                    <small>Images can be (more than one) for display</small>
                                                    <div class="card mt-2 border-0 imagesUploadCard mt-1 p-4 mx-auto shadow">
                                                        <input type="file" name="stockImage[]" id="editImages" multiple class="form-control @error('stockImage') is-invalid @enderror"
                                                            required/>
                                                        @error('stockImage')
                                                            <small class="invalid-feedback" role="alert">
                                                                {{ $message }}
                                                            </small>
                                                        @enderror
                                                        <div class="row justify-content-center" id="edit_preview"></div>
                                                    </div>
                                                    <div class="form-group mt-3">
                                                        <label for="stockName">Stock Name</label>
                                                        <input type="text" name="stock_name" id="stockName" value="{{$stock->stock_name}}" class="form-control @error('stock_name') is-invalid @enderror"
                                                            required placeholder="G-Class Benz, Lamborghini Urus..." />
                                                        @error('stock_name')
                                                            <small class="invalid-feedback" role="alert">
                                                                {{ $message }}
                                                            </small>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <label for="stock_brand">Stock Brand</label>
                                                        <input type="text" name="stock_brand" id="stock_brand" value="{{$stock->stock_brand}}" class="form-control @error('stock_brand') is-invalid @enderror"
                                                            required placeholder="Mercedez, Tesla, Apple..." />
                                                        @error('stock_brand')
                                                            <small class="invalid-feedback" role="alert">
                                                                {{ $message }}
                                                            </small>
                                                        @enderror
                                                    </div>
                                                    <div class="row mt-2">
                                                        <div class="form-group col-6">
                                                            <label for="stock_quantity">Stock Quantity</label>
                                                            <input type="number" name="stock_quantity" id="stock_quantity" value="{{$stock->stock_quantity}}" class="form-control @error('stock_quantity') is-invalid @enderror"
                                                                required placeholder="100000, 500, 90, 2..." />
                                                            @error('stock_quantity')
                                                                <small class="invalid-feedback" role="alert">
                                                                    {{ $message }}
                                                                </small>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group col-6">
                                                            <label for="expiry_date">Expiry Date</label>
                                                            <input type="date" name="expiry_date" id="expiry_date" value="{{$stock->expiry_date}}" class="form-control @error('expiry_date') is-invalid @enderror"
                                                                required autocomplete="expiry_date" />
                                                            @error('expiry_date')
                                                                <small class="invalid-feedback" role="alert">
                                                                    {{ $message }}
                                                                </small>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="row mt-2">
                                                        <div class="form-group col-6">
                                                            <label for="cost_price">Cost Price</label>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text">$</span>
                                                                <input type="number" name="cost_price" id="cost_price" value="{{$stock->cost_price}}" class="form-control @error('cost_price') is-invalid @enderror" required />
                                                            </div>
                                                            @error('cost_price')
                                                                <small class="invalid-feedback" role="alert">
                                                                    {{ $message }}
                                                                </small>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group col-6">
                                                            <label for="selling_price">Selling Price</label>
                                                            <div class="input-group mb-3">
                                                                <span class="input-group-text">$</span>
                                                                <input type="number" name="selling_price" id="selling_price" value="{{$stock->selling_price}}" class="form-control @error('selling_price') is-invalid @enderror"
                                                                    required autocomplete="selling_price" />
                                                            </div>
                                                            @error('selling_price')
                                                                <small class="invalid-feedback" role="alert">
                                                                    {{ $message }}
                                                                </small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <div class="col-12 clearfix">
                                                    <button class="float-end btn btn-primary text-white" id="editImageUpoad"><i class="fa warehouse me-2"></i>Edit Stock</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <!-- The Add To Product Modal -->
                            <form method="POST" action="product">
                                {{ csrf_field() }}
                                <div class="modal fade shadow" id="addProductModal{{$stock->id}}" tabindex="-1" aria-labelledby="addProductModalLabel{{$stock->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <h5 class="fw-bold">Add Product Section</h5>
                                                <div class="container-fliud">
                                                    <input type="number" name="stock_id" id="stock_id" value="{{$stock->id}}" class="form-control" hidden />
                                                    <div class="form-group">
                                                        <label>Product Name</label>
                                                        <input type="text" name="product_name" id="product_name" value="{{$stock->stock_name}}" class="form-control @error('product_name') is-invalid @enderror" required />
                                                        @error('product_name')
                                                            <small class="invalid-feedback" role="alert">
                                                                {{ $message }}
                                                            </small>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Product Quantity</label>
                                                            <select name="product_quantity" id="product_quantity" class="form-control @error('product_quantity') is-invalid @enderror" required>
                                                                <option value="">--Select Quantity--</option>
                                                                @for($i= 1; $i <= ($stock->stock_quantity - $stock->proRem); $i++)
                                                                    <option value="{{$i}}">{{$i}}</option>
                                                                @endfor
                                                                @error('product_quantity')
                                                                    <small class="invalid-feedback" role="alert">
                                                                        {{ $message }}
                                                                    </small>
                                                                @enderror
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group my-3">
                                                        <label for="productDescription" class="my-2">Product Description</label>
                                                        <textarea name="product_description" rows="6" id="product_descrition" class="form-control @error('product_description') is-invalid @enderror"
                                                            required placeholder="One of the most unique products| Durable| Standard Size: 20|30|34|45|50... " ></textarea>
                                                        @error('product_description')
                                                            <small class="invalid-feedback" role="alert">
                                                                {{ $message }}
                                                            </small>
                                                        @enderror
                                                    </div>
                                                    <div class="col-12 form-group">
                                                        <button class="btn btn-primary form-control text-white"><i class="fa warehouse me-2"></i>Add to Products</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        @endforeach
                    @endif

                </div>
                <!-- footer details -->
                @include('includes.footer')
            </div>
        </div>
        <script>
            $(document).ready(function(){
                $("#stockImages").change(function(){
                    $('#my_preview').html("");
                    var total_file=document.getElementById('stockImages').files.length;
                    for(var i=0; i<total_file; i++){
                        $('#my_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'/>");
                    }
                });
                $("#editImages").change(function(){
                    $('#edit_preview').html("");
                    var total_file=document.getElementById('editImages').files.length;
                    for(var i=0; i<total_file; i++){
                        $('#edit_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'/>");
                    }
                });
            })
			// $("#myform").submit(function(e){
			// 	e.preventDefault();
			// 	if (comment.value=="") {
			// 		aler.hidden=false;
			// 		return;
			// 	}
			// 	loader.hidden=false;
			// 	$.ajax({
			// 		url: 'all_posts.php',
			// 		type: 'POST',
			// 		data: new FormData(this),
			// 		contentType: false,
			// 		cache:false,
			// 		processData:false,
			// 		success: function(response)
			// 		{
			// 			loader.hidden=true;
			// 			// console.log(response);
			// 		}

			// 	});
			// });
        </script>
    @endsection
