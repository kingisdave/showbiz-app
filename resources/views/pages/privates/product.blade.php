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
                                    {{-- <div class="row"> --}}
                                        {{-- @if(count($products) > 0)
                                            @foreach($products as $product)
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
                                                                    <h6 class="fw-bold text-center">{{$product->product_name}}</h6>
                                                                    <p class="clearfix">
                                                                        <span class="small float-start">{{$product->selling_price}}</span>
                                                                        @if($product->created_at > now())
                                                                            <span class="small float-end bg-danger p-1">New</span>
                                                                        @else
                                                                            <span class="small float-end bg-danger p-1">New</span>
                                                                        @endif
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach    
                                        @endif
                                    </div> --}}

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
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="newProduct" role="tabpanel" aria-labelledby="newProduct-tab">
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
                                    </div>
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
                    <div class="modal fade productDetails" id="productDetailsModal" tabindex="-1" aria-labelledby="productDetailsModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="container-fliud">
                                        <div class="card mt-2 border-0 otherTitleCard mt-1 p-4 mx-auto shadow">
                                            <h5 class="text-white text-center">Nike Air Max 270 to King Dave 1</h5>
                                            <div class="row">
                                                <div id="carouselExampleSlidesOnly" class="col-12 carousel slide" data-bs-ride="carousel">
                                                    <div class="carousel-inner">
                                                        <div class="carousel-item active">
                                                            {{-- <div class="mx-auto insideModal rounded mt-4">
                                                                <img src="/images/shoe.jpg" class="img-thumbnail border-0 rounded shadow alt="shoe" />
                                                            </div> --}}
                                                            <img src="/images/shoe.jpg" class="d-block w-100 rounded shadow alt="shoe" />
                                                        </div>
                                                        <div class="carousel-item">
                                                            {{-- <div class="mx-auto insideModal rounded mt-4">
                                                                <img src="/images/shoe.jpg" class="img-thumbnail border-0 rounded shadow alt="shoe" />
                                                            </div> --}}
                                                            <img src="/images/shoe.jpg" class="d-block w-100 rounded shadow alt="shoe" />
                                                        </div>
                                                        <div class="carousel-item">
                                                            {{-- <div class="mx-auto insideModal rounded mt-4">
                                                                <img src="/images/shoe.jpg" class="img-thumbnail border-0 rounded shadow alt="shoe" />
                                                            </div> --}}
                                                            <img src="/images/shoe.jpg" class="d-block w-100 rounded shadow alt="shoe" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 row my-2">
                                                    <div class="col-4">
                                                        <div class="mx-auto smallInsideModal rounded">
                                                            <img src="/images/shoe.jpg" class="img-thumbnail border-0 rounded shadow" alt="shoe"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="mx-auto smallInsideModal rounded">
                                                            <img src="/images/shoe.jpg" class="img-thumbnail border-0 rounded shadow" alt="shoe" />
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="mx-auto smallInsideModal rounded">
                                                            <img src="/images/shoe.jpg" class="img-thumbnail border-0 rounded shadow" alt="shoe" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <h5 class="text-center fw-bold">$399.99</h5>
                                                    <h6>Product Description</h6>
                                                    <p>
                                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quo eius, 
                                                        officia itaque aut corporis voluptatum fugit totam. Iure, eius. 
                                                        Modi reiciendis maxime quae quam tempora asperiores magni vel 
                                                        ullam accusantium.
                                                    </p>
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
                                        <button class="float-start btn btn-primary text-white"><i class="fa fa-arrow-left me-2"></i>Back to Stock</button>
                                        <button class="float-end btn btn-outline-danger"><i class="fa fa-trash me-2"></i>Delete</button>
                                    </div>
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
        </script>
    @endsection