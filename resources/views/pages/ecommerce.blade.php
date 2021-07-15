@extends('layouts.app')

    @section('content')
        @include('includes.navbar')
        <div class="container-fluid ecommerceWrapper">
            <div class="row">
                <div class="col-12">
                    <div class="card border-0 eCard mt-3 p-2 mx-auto shadow">
                        <div class="card-body p-2 eCardBody">
                            @include('includes.ecommerceTop')
                            
                            @if (session('successMessage'))
                                <div class="text-center">
                                    <span class="alert alert-success logalert rounded-pill" role="alert">
                                        {{ session('successMessage') }}
                                    </span>
                                </div>
                            @endif
                            @if(session('errorMessage'))
                                <div class="text-center">
                                    <span class="alert alert-danger logalert rounded-pill" role="alert">
                                        {{ session('errorMessage') }}
                                    </span>
                                </div>
                            @endif
                            <div class="card mt-2 border-0 innerTitleCard mt-1 p-4 mx-auto shadow">
                                <div class="d-flex align-items-start">
                                    <h4 class="fw-bolder mx-auto text-white">Shop</h4>
                                    @if($myCart)
                                        <p class="fw-bold text-end text-white me-2">$ {{$myCart->sum('product_price')}}</p>
                                    @else
                                        <p class="fw-bold text-end text-white me-2">$ 0.00</p>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @if ($clientProducts)
                                            @if(count($clientProducts) > 0)
                                                @foreach ($clientProducts as $item)
                                                    <div class="col-md-3 col-sm-6">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#productDetailsModal{{$item->id}}" data-bs-whatever="@productOne">
                                                            <div class="card mx-2 mb-4 shadow cardHeight d-flex align-self-end">
                                                                <img src="/storage/{{substr($item->file[0]->stockImages, 7)}}" class="mx-auto"
                                                                    alt="{{substr($item->file[0]->stockImages, 7)}}" />
                                                                <div class="card-img-overlay d-flex align-items-end padOff">
                                                                    <div class="infoTextBelow mx-auto text-center">
                                                                        <h5 class="card-title fw-bold">{{$item->product_name}}</h5>
                                                                        <p class="card-text"><small class="fw-bold">{{$item->product_price}}</small></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>    
                                                @endforeach
                                            @else
                                            @endif    
                                        @else
                                            <div class="col-md-4 col-sm-6">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#productDetailsModal" data-bs-whatever="@productOne">
                                                    <div class="card mx-2 mb-4 shadow cardHeight d-flex align-self-end">
                                                        <img src="images/shoe.jpg" class="mx-auto" alt="shoe">
                                                        <div class="card-img-overlay d-flex align-items-end padOff">
                                                            <div class="infoTextBelow mx-auto text-center">
                                                                <h5 class="card-title fw-bold">Card title</h5>
                                                                <p class="card-text"><small class="fw-bold">$2334.55</small></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#productDetailsModal">
                                                    <div class="card mx-2 mb-4 shadow cardHeight d-flex align-self-end">
                                                        <img src="images/shoe.jpg" class="mx-auto" alt="shoe">
                                                        <div class="card-img-overlay d-flex align-items-end padOff">
                                                            <div class="infoTextBelow mx-auto text-center">
                                                                <h5 class="card-title fw-bold">Card title</h5>
                                                                <p class="card-text"><small class="fw-bold">$2334.55</small></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#productDetailsModal">
                                                    <div class="card mx-2 mb-4 shadow cardHeight d-flex align-self-end">
                                                        <img src="images/shoe.jpg" class="mx-auto" alt="shoe">
                                                        <div class="card-img-overlay d-flex align-items-end padOff">
                                                            <div class="infoTextBelow mx-auto text-center">
                                                                <h5 class="card-title fw-bold">Card title</h5>
                                                                <p class="card-text"><small class="fw-bold">$2334.55</small></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>    
                                        @endif
                                        
                                        {{-- <div class="col-md-4 col-sm-6">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#productDetailsModal" data-bs-whatever="@productOne">
                                                <div class="card mx-2 mb-4 shadow cardHeight d-flex align-self-end">
                                                <img src="images/shoe.jpg" class="mx-auto" alt="shoe">
                                                <div class="card-img-overlay d-flex align-items-end padOff">
                                                    <div class="infoTextBelow mx-auto text-center">
                                                        <h5 class="card-title fw-bold">Card title</h5>
                                                        <p class="card-text"><small class="fw-bold">$2334.55</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#productDetailsModal">
                                                <div class="card mx-2 mb-4 shadow cardHeight d-flex align-self-end">
                                                <img src="images/shoe.jpg" class="mx-auto" alt="shoe">
                                                <div class="card-img-overlay d-flex align-items-end padOff">
                                                    <div class="infoTextBelow mx-auto text-center">
                                                        <h5 class="card-title fw-bold">Card title</h5>
                                                        <p class="card-text"><small class="fw-bold">$2334.55</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#productDetailsModal">
                                                <div class="card mx-2 mb-4 shadow cardHeight d-flex align-self-end">
                                                <img src="images/shoe.jpg" class="mx-auto" alt="shoe">
                                                <div class="card-img-overlay d-flex align-items-end padOff">
                                                    <div class="infoTextBelow mx-auto text-center">
                                                        <h5 class="card-title fw-bold">Card title</h5>
                                                        <p class="card-text"><small class="fw-bold">$2334.55</small></p>
                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                        </div> --}}
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- The Each Product details Modal -->
        @if(count($clientProducts) > 0)
            @foreach ($clientProducts as $item)
                <div class="modal fade productDetails" id="productDetailsModal{{$item->id}}" tabindex="-1" aria-labelledby="productDetailsModalLabel{{$item->id}}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                    
                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="container-fliud">
                                    <div class="card mt-2 border-0 otherTitleCard mt-1 p-4 mx-auto shadow">
                                        <h4 class="text-white text-center">{{$item->product_name}}</h4>
                                        {{-- <h4 class="text-white text-center">Nike Air Max 270 to King Dave 1</h4> --}}
                                        <div class="row">
                                            <div id="carouselExampleSlidesOnly" class="col-12 carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        {{-- <div class="mx-auto insideModal rounded mt-4">
                                                            <img src="images/shoe.jpg" class="img-thumbnail border-0 rounded shadow alt="shoe" />
                                                        </div> --}}
                                                        {{-- <img src="images/shoe.jpg" class="d-block w-100 rounded shadow alt="shoe" /> --}}
                                                        <img src="/storage/{{substr($item->file[0]->stockImages, 7)}}" height="250" class="d-block w-100 rounded shadow mx-auto"
                                                            alt="{{substr($item->file[0]->stockImages, 7)}}" />
                                                    </div>
                                                    @if (count($item->file) > 1)
                                                        <div class="carousel-item">
                                                            <img src="/storage/{{substr($item->file[1]->stockImages, 7)}}" height="250" class="d-block w-100 rounded shadow mx-auto"
                                                                alt="{{substr($item->file[1]->stockImages, 7)}}" />
                                                        </div>
                                                    @endif
                                                    @if (count($item->file) > 2)
                                                        <div class="carousel-item">
                                                            <img src="/storage/{{substr($item->file[2]->stockImages, 7)}}" height="250" class="d-block w-100 rounded shadow mx-auto"
                                                                alt="{{substr($item->file[2]->stockImages, 7)}}" />
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-12 row my-2">
                                                <div class="col-4">
                                                    <div class="mx-auto smallInsideModal rounded">
                                                        <img src="/storage/{{substr($item->file[0]->stockImages, 7)}}" class="img-thumbnail border-0 rounded shadow"
                                                            alt="{{substr($item->file[0]->stockImages, 7)}}" />
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    @if (count($item->file) > 1)
                                                        <div class="mx-auto smallInsideModal rounded">
                                                            <img src="/storage/{{substr($item->file[1]->stockImages, 7)}}" class="img-thumbnail border-0 rounded shadow"
                                                                alt="{{substr($item->file[1]->stockImages, 7)}}" />
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-4">
                                                    @if (count($item->file) > 2)
                                                        <div class="mx-auto smallInsideModal rounded">
                                                            <img src="/storage/{{substr($item->file[2]->stockImages, 7)}}" class="img-thumbnail border-0 rounded shadow"
                                                                alt="{{substr($item->file[2]->stockImages, 7)}}" />
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-12 mt-2">
                                                <h5 class="text-center fw-bold">{{$item->product_price}}</h5>
                                                <h6>Product Description</h6>
                                                <p>{{$item->product_description}}</p>
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
                            {{-- <form class="form"> --}}
                            <form class="form" method="POST" action="cart">
                                @csrf
                                <div class="modal-footer">
                                    <div class="col-3">Select quantity</div>
                                    <div class="col-2 form-group">
                                        <select name="order_quantity" id="order_quantity" class="form-control @error('order_quantity') is-invalid @enderror" required>
                                            <option value="">--Select Quantity--</option>
                                            @for($i= 1; $i <= $item->product_quantity; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                            @error('order_quantity')
                                                <small class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <input name="product_id" id="myitem" class="myitem" value="{{$item->id}}" hidden />
                                        <button type="submit" class="btn btn-primary" onclick="orderBtn()" >Add to cart</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        {{-- <script>
            var myCartsArr=[], mycarts={};
            var myitem = document.getElementById("myitem").value;
            // let product = document.querySelector('.item');
            // var myCartsObj = {}
            orderBtn=(e)=>{
                alert(myitem);
                // alert(product.value);
                // let product = document.getElementById('product');
                // myCartsArr.push(product.value);
                // console.log(myCartsArr);
            //     localStorage.setItem('auth-token', json.token);
            // let myJsonToken = localStorage.getItem("auth-token");
            }
        </script> --}}
    @endsection