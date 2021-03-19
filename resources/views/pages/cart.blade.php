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
                            <div class="card mt-2 border-0 innerTitleCard mt-1 py-4 mx-auto shadow">
                                <div class="d-flex align-items-start">
                                    <h4 class="fw-bolder mx-auto text-white">Cart</h4>
                                    @if($carts)
                                        <p class="fw-bold text-end text-white me-4">$ {{$carts->sum('product_price')}}</p>
                                    @else
                                        <p class="fw-bold text-end text-white me-4">$ 0.00</p>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <div class="mx-auto cartContainer">
                                        @if(count($myCart) > 0)
                                            @foreach ($myCart as $cart)
                                            <div class="card cartCardHeight my-2">
                                                <div class="card-body row">
                                                    <div class="col-md-4 col-sm-4 col-12">
                                                        {{-- <img src="images/shoe.jpg" class="img-fluid border-0 shadow" alt="shoe" /> --}}
                                                        <img src="/storage/{{substr($cart->file[0]->stockImages, 7)}}" class="img-fluid border-0 shadow"
                                                            alt="{{substr($cart->file[0]->stockImages, 7)}}" />
                                                    </div>
                                                    <div class="col-4 col-sm-4 col-12 py-2">
                                                        <p class="text-center fw-bolder">{{$cart->product_name}}</p>
                                                        <p>{{$cart->product_description}}</p>
                                                    </div>
                                                    <div class="col-4 col-sm-4 col-12 py-2 d-flex align-items-start">
                                                        <p class="text-center fw-bold mx-auto">$ {{$cart->product_price}}</p>
                                                        
                                                        <button class="btn btn-dark mt-auto" onclick="var cc = <?php echo 'removeFromCart'.$cart->id ?>; if(confirm('Do you wish to remove this product? If not, press Cancel')){ cc.submit() }">
                                                            <i class="fa fa-trash me-2"></i>Remove</button>
                                                        <form method="POST" id="{{'removeFromCart'.$cart->id}}" action="{{route('cart.destroy', $cart->id)}}">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>        
                                            @endforeach
                                        @else
                                            <div class="alert alert-danger">
                                                <span class="text-center">There are not items in your cart</span>
                                            </div>
                                        @endif
                                        {{-- <div class="card cartCardHeight my-2">
                                            <div class="card-body row">
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <img src="images/shoe.jpg" class="img-fluid border-0 shadow" alt="shoe" />
                                                </div>
                                                <div class="col-4 col-sm-4 col-12 py-2">
                                                    <p class="text-center fw-bolder">Nike Air Max 270 to King Dave 1</p>
                                                    <p>Lorem ipsum, dolor sit amet</p>
                                                </div>
                                                <div class="col-4 col-sm-4 col-12 py-2">
                                                    <p class="text-center fw-bold">$134450.44</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card cartCardHeight my-2">
                                            <div class="card-body row">
                                                <div class="col-md-4 col-sm-4 col-12">
                                                    <img src="images/shoe.jpg" class="img-fluid border-0 shadow" alt="shoe" />
                                                </div>
                                                <div class="col-4 col-sm-4 col-12 py-2">
                                                    <p class="text-center fw-bolder">Nike Air Max 270 to King Dave 1</p>
                                                    <p>Lorem ipsum, dolor sit amet c</p>
                                                </div>
                                                <div class="col-4 col-sm-4 col-12 py-2">
                                                    <p class="text-center fw-bold">$134450.44</p>
                                                </div>
                                            </div>
                                        </div> --}}
                                        
                                        <div class="card totalCartHeight my-2">
                                            <div class="card-body row">
                                                <div class="col-md-8">
                                                    <h4 class="fw-bold">Total Purchase</h4>
                                                </div>
                                                <div class="col-md-4">
                                                    @if($carts)
                                                        <p class="text-center fw-bold">$ {{$carts->sum('product_price')}}</p>
                                                    @else
                                                        <p class="text-center fw-bold">$ 0.00</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="my-2">
                                            <div class="row">
                                                <div class="col-md-8">
                                                </div>
                                                <div class="col-md-4 form-group"> 
                                                    <button class="btn btn-block form-control btn-danger text-white text-center shadow" data-bs-toggle="modal" data-bs-target="#checkOutModal" title="Add To Product">
                                                        <i class="fa fa-arrow-right me-2"></i>Checkout
                                                    </button>
                                                   {{-- <form method="POST" action="dashboard/store/order">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="text" name="buyer_id" id="buyer_id" value="{{auth()->user()->id}}" hidden />
                                                        <button class="btn btn-block form-control btn-danger text-white text-center" type="submit" >
                                                                <i class="fa fa-shopping-bag me-2"></i>Checkout</button>
                                                    </form> --}}
                                                </div>
                                            </div>
                                        </div>

                                        <!-- The Add To Product Modal -->
                                        <form method="POST" action="dashboard/store/order">
                                            {{ csrf_field() }}
                                            @method('PUT')
                                            <div class="modal fade shadow" id="checkOutModal" tabindex="-1" aria-labelledby="checkOutModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <!-- Modal body -->
                                                        <div class="modal-body">
                                                            <h5 class="fw-bold">Your Address</h5>
                                                            <div class="container-fliud">
                                                                <input type="text" name="buyer_id" id="buyer_id" value="{{auth()->user()->id}}" hidden />
                                                                <div class="form-group">
                                                                    <label for="street" class="my-2">Street Address:</label>
                                                                    <input type="text" name="street_address" id="street_address" class="form-control" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" name="zip_code" id="zip_code" class="form-control" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" name="zip_code" id="zip_code" class="form-control" />
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
