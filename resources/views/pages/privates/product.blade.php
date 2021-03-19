@extends('layouts.app')

    @section('content')
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/myckeditor.js') }}"></script>

        <div class="wrapper container-fluid" id="conta">
            @include('includes.sidenav')
            <div class="main_container">
                @include('includes.dashboardheader')
                <div class="container-fluid dashboardBorder pt-2">
                    <h4 class="fw-bolder mt-2">Product</h4>
                    @if(count($products) > 0)
                        {{-- <p class="small">{{count($products)}} new stocks available</p> --}}
                        @foreach($products as $product) 
                            @if(\Carbon\Carbon::now()->diffInWeeks($product->created_at) < 2 ) 
                                @if ($loop->count > 0)
                                    <p class="small">{{$loop->count}} new products available</p>
                                    @break
                                @else
                                    <p class="small">No New product available yet</p>
                                    @break                        
                                @endif
                            @endif
                        @endforeach
                    @else
                        <p class="small">No product available yet</p>
                    @endif
                    <hr />
                    <div class="row shopOrdersRow bg-light">
                        <ul class="nav nav-tabs bg-info pt-2 small" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="allProducts-tab" data-bs-toggle="tab" data-bs-target="#allProducts" type="button" role="tab" aria-controls="allProducts" aria-selected="true">All Products</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="newProduct-tab" data-bs-toggle="tab" data-bs-target="#newProduct" type="button" role="tab" aria-controls="newProduct" aria-selected="false">New</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="selectedProduct-tab" data-bs-toggle="tab" data-bs-target="#selectedProduct" type="button" role="tab" aria-controls="selectedProduct" aria-selected="false">Selected</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="soldProduct-tab" data-bs-toggle="tab" data-bs-target="#soldProduct" type="button" role="tab" aria-controls="soldProduct" aria-selected="false">Sold</button>
                            </li>
                        </ul>
                        <div class="tab-content mt-3 pt-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="allProducts" role="tabpanel" aria-labelledby="allProducts-tab">
                                <div class="row">
                                    @if(count($products) > 0)
                                        @foreach($products as $product)                                   
                                            <div class="col-md-3 col-sm-4 col-12 newPcard">
                                                {{-- <a href="#" data-bs-toggle="modal" data-bs-target="#stockDetailsModal{{$product->id}}" data-bs-whatever="@productOne"> --}}
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#productDetailsModal{{$product->id}}" data-bs-whatever="@productOne">
                                                    <div class="card mx-2 mb-4 shadow productCard d-flex align-self-end">
                                                        <img src="/storage/{{substr($product->file[0]->stockImages, 7)}}" class="mx-auto" 
                                                            alt="{{substr($product->file[0]->stockImages, 7)}}">
                                                        <div class="card-img-overlay d-flex align-items-end padOff">
                                                            <div class="infoTextBelow belowText mx-auto small">
                                                                <h6 class="fw-bold text-center">{{$product->product_name}}</h6>
                                                                <p class="clearfix">
                                                                    <span class="small float-start">$ {{$product->product_price}}</span>
                                                                    @if(\Carbon\Carbon::now()->diffInWeeks($product->created_at) < 2 )
                                                                        <span class="small float-end bg-danger p-1">New</span>
                                                                    @endif
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>

                                        @endforeach
                                    @else
                                        <div class="text-center">
                                            <span class="alert alert-danger text-center">You have no product yet!</span>
                                        </div>
                                    @endif

                                    {{-- <div class="col-md-3 col-sm-4 col-12">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#productDetailsModal" data-bs-whatever="@productOne">
                                            <div class="card mx-2 mb-4 shadow productCard d-flex align-self-end">
                                                <img src="/images/shoe.jpg" class="mx-auto" alt="shoe">
                                                <div class="card-img-overlay d-flex align-items-end padOff">
                                                    <div class="infoTextBelow belowText mx-auto small">
                                                        <h6 class="fw-bold">Card title</h6>
                                                        <p class="clearfix">
                                                            <span class="small float-start">$2334.55</span>
                                                            <span class="small float-end bg-danger p-1">New</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-12">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#productDetailsModal" data-bs-whatever="@productOne">
                                            <div class="card mx-2 mb-4 shadow productCard d-flex align-self-end">
                                                <img src="/images/shoe.jpg" class="mx-auto" alt="shoe">
                                                <div class="card-img-overlay d-flex align-items-end padOff">
                                                    <div class="infoTextBelow belowText mx-auto small">
                                                        <h6 class="fw-bold">Card title</h6>
                                                        <p class="clearfix">
                                                            <span class="small float-start">$2334.55</span>
                                                            <span class="small float-end bg-success p-1">Selected</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-12">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#productDetailsModal" data-bs-whatever="@productOne">
                                            <div class="card mx-2 mb-4 shadow productCard d-flex align-self-end">
                                                <img src="/images/shoe.jpg" class="mx-auto" alt="shoe">
                                                <div class="card-img-overlay d-flex align-items-end padOff">
                                                    <div class="infoTextBelow belowText mx-auto small">
                                                        <h6 class="fw-bold">Card title</h6>
                                                        <p class="clearfix">
                                                            <span class="small float-start">$2334.55</span>
                                                            <span class="small float-end bg-secondary p-1">Sold</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="newProduct" role="tabpanel" aria-labelledby="newProduct-tab">
                                <div class="row">
                                    @if(count($products) > 0)
                                        @foreach($products as $product) 
                                            @if(\Carbon\Carbon::now()->diffInWeeks($product->created_at) < 2 )                                       
                                                <div class="col-md-3 col-sm-4 col-12 newPcard">
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#productDetailsModal{{$product->id}}" data-bs-whatever="@productOne">
                                                    {{-- <a href="#" data-bs-toggle="modal" data-bs-target="#stockDetailsModal{{$product->id}}" data-bs-whatever="@productOne"> --}}
                                                        <div class="card mx-2 mb-4 shadow productCard d-flex align-self-end">
                                                            <img src="/storage/{{substr($product->file[0]->stockImages, 7)}}" class="mx-auto" 
                                                                alt="{{substr($product->file[0]->stockImages, 7)}}">
                                                            <div class="card-img-overlay d-flex align-items-end padOff">
                                                                <div class="infoTextBelow belowText mx-auto small">
                                                                    <h6 class="fw-bold text-center">{{$product->stock_name}}</h6>
                                                                    <p class="clearfix">
                                                                        <span class="small float-start">$ {{$product->product_price}}</span>
                                                                        {{-- @if(\Carbon\Carbon::now()->diffInWeeks($product->created_at) > 2 )           
                                                                            <span class="small float-end bg-primary p-1">Old</span>
                                                                        @else --}}
                                                                            <span class="small float-end bg-danger p-1">New</span>
                                                                        {{-- @endif --}}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endif
                                        @endforeach
                                    @else
                                        <div class="text-center">
                                            <span class="alert alert-danger text-center">You have no New Product yet!</span>
                                        </div>
                                    @endif
                                    {{-- <div class="col-md-3 col-sm-4 col-12">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#productDetailsModal" data-bs-whatever="@productOne">
                                            <div class="card mx-2 mb-4 shadow productCard d-flex align-self-end">
                                                <img src="/images/shoe.jpg" class="mx-auto" alt="shoe">
                                                <div class="card-img-overlay d-flex align-items-end padOff">
                                                    <div class="infoTextBelow belowText mx-auto small">
                                                        <h6 class="fw-bold">Card title</h6>
                                                        <p class="clearfix">
                                                            <span class="small float-start">$2334.55</span>
                                                            <span class="small float-end bg-danger p-1">New</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-12">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#productDetailsModal" data-bs-whatever="@productOne">
                                            <div class="card mx-2 mb-4 shadow productCard d-flex align-self-end">
                                                <img src="/images/shoe.jpg" class="mx-auto" alt="shoe">
                                                <div class="card-img-overlay d-flex align-items-end padOff">
                                                    <div class="infoTextBelow belowText mx-auto small">
                                                        <h6 class="fw-bold">Card title</h6>
                                                        <p class="clearfix">
                                                            <span class="small float-start">$2334.55</span>
                                                            <span class="small float-end bg-danger p-1">New</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="tab-pane fade" id="selectedProduct" role="tabpanel" aria-labelledby="selectedProduct-tab">
                                <div class="row">
                                    <div class="col-md-3 col-sm-4 col-12">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#productDetailsModal" data-bs-whatever="@productOne">
                                            <div class="card mx-2 mb-4 shadow productCard d-flex align-self-end">
                                                <img src="/images/shoe.jpg" class="mx-auto" alt="shoe">
                                                <div class="card-img-overlay d-flex align-items-end padOff">
                                                    <div class="infoTextBelow belowText mx-auto small">
                                                        <h6 class="fw-bold">Card title</h6>
                                                        <p class="clearfix">
                                                            <span class="small float-start">$2334.55</span>
                                                            <span class="small float-end bg-success p-1">Selected</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-12">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#productDetailsModal" data-bs-whatever="@productOne">
                                            <div class="card mx-2 mb-4 shadow productCard d-flex align-self-end">
                                                <img src="/images/shoe.jpg" class="mx-auto" alt="shoe">
                                                <div class="card-img-overlay d-flex align-items-end padOff">
                                                    <div class="infoTextBelow belowText mx-auto small">
                                                        <h6 class="fw-bold">Card title</h6>
                                                        <p class="clearfix">
                                                            <span class="small float-start">$2334.55</span>
                                                            <span class="small float-end bg-success p-1">Selected</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="soldProduct" role="tabpanel" aria-labelledby="soldProduct-tab">
                                <div class="row">
                                    <div class="col-md-3 col-sm-4 col-12">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#productDetailsModal" data-bs-whatever="@productOne">
                                            <div class="card mx-2 mb-4 shadow productCard d-flex align-self-end">
                                                <img src="/images/shoe.jpg" class="mx-auto" alt="shoe">
                                                <div class="card-img-overlay d-flex align-items-end padOff">
                                                    <div class="infoTextBelow belowText mx-auto small">
                                                        <h6 class="fw-bold">Card title</h6>
                                                        <p class="clearfix">
                                                            <span class="small float-start">$2334.55</span>
                                                            <span class="small float-end bg-secondary p-1">Sold</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-12">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#productDetailsModal" data-bs-whatever="@productOne">
                                            <div class="card mx-2 mb-4 shadow productCard d-flex align-self-end">
                                                <img src="/images/shoe.jpg" class="mx-auto" alt="shoe">
                                                <div class="card-img-overlay d-flex align-items-end padOff">
                                                    <div class="infoTextBelow belowText mx-auto small">
                                                        <h6 class="fw-bold">Card title</h6>
                                                        <p class="clearfix">
                                                            <span class="small float-start">$2334.55</span>
                                                            <span class="small float-end bg-secondary p-1">Sold</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- The Each Product details Modal -->
                    @if(count($products) > 0)
                        @foreach($products as $product)
                            <div class="modal fade productDetails" id="productDetailsModal{{$product->id}}" tabindex="-1" aria-labelledby="productDetailsModalLabel{{$product->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <div class="container-fliud">
                                                <div class="card mt-2 border-0 otherTitleCard mt-1 p-4 mx-auto shadow">
                                                    <h5 class="text-white text-center">{{$product->product_name}}</h5>
                                                    <div class="row">
                                                        <div id="carouselExampleSlidesOnly" class="col-12 carousel slide" data-bs-ride="carousel">
                                                            <div class="carousel-inner">
                                                                <div class="carousel-item active">
                                                                    <img src="/storage/{{substr($product->file[0]->stockImages, 7)}}" 
                                                                        class="d-block w-100 rounded shadow" height="250" alt="{{substr($product->file[0]->stockImages, 7)}}" />
                                                                </div>
                                                                @if (count($product->file) > 1)
                                                                    <div class="carousel-item">
                                                                        <img src="/storage/{{substr($product->file[1]->stockImages, 7)}}" 
                                                                                class="d-block w-100 rounded shadow" height="250" alt="{{substr($product->file[1]->stockImages, 7)}}" />
                                                                    </div>
                                                                @endif
                                                                @if (count($product->file) > 2)
                                                                    <div class="carousel-item">
                                                                        <img src="/storage/{{substr($product->file[2]->stockImages, 7)}}" 
                                                                            class="d-block w-100 rounded shadow" height="250" alt="{{substr($product->file[2]->stockImages, 7)}}" />
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-12 row my-2">
                                                            <div class="col-4">
                                                                <div class="mx-auto smallInsideModal rounded">
                                                                    <img src="/storage/{{substr($product->file[0]->stockImages, 7)}}" class="img-thumbnail border-0 rounded shadow" alt="{{substr($product->file[0]->stockImages, 7)}}"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-4">
                                                                @if (count($product->file) > 1)
                                                                    <div class="mx-auto smallInsideModal rounded">
                                                                        <img src="/storage/{{substr($product->file[1]->stockImages, 7)}}" class="img-thumbnail border-0 rounded shadow" alt="{{substr($product->file[1]->stockImages, 7)}}" />
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div class="col-4">
                                                                @if (count($product->file) > 2)
                                                                    <div class="mx-auto smallInsideModal rounded">
                                                                        <img src="/storage/{{substr($product->file[2]->stockImages, 7)}}" class="img-thumbnail border-0 rounded shadow" alt="{{substr($product->file[2]->stockImages, 7)}}" />
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-12 mt-2">
                                                            <h5 class="text-center fw-bold">Price: ${{$product->product_price}}</h5>
                                                            {{-- <h6 class="clearfix fw-bold">
                                                                <span class="float-end"><small class="small">Sell</small><br/>${{$product->product_price}}</span>
                                                            </h6> --}}
                                                            <h6>Product Description</h6>
                                                            <p>{{$product->product_description}}</p>
                                                            <p class="text-primary">
                                                                Review: <i class="fa fa-star text-warning"></i>
                                                                <i class="fa fa-star text-warning"></i>
                                                                <i class="fa fa-star text-warning"></i>
                                                                <i class="fa fa-star text-warning"></i>
                                                                <i class="fa fa-star text-warning"></i>
                                                                <small>5.0(40)</small>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <div class="col-12 clearfix">
                                                {{-- <button class="float-start btn btn-primary text-white"><i class="fa fa-arrow-left me-2"></i>Remove from Products</button> --}}
                                                {{-- <button class="float-end btn btn-outline-danger"><i class="fa fa-trash me-2"></i>Delete</button> --}}
                                                <button class="float-end btn btn-primary text-white" onclick="var bb = <?php echo 'removeProduct'.$product->id ?>; if(confirm('Do you wish to remove this product? If not, press Cancel')){ bb.submit() }">
                                                    <i class="fa fa-arrow-left me-2"></i>Remove from Products</button>
                                                <form method="POST" id="{{'removeProduct'.$product->id}}" action="{{route('product.destroy', $product->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <div class="row mt-2">
                        
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