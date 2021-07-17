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
                                                @if ($cart->order_status_id === 0)
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
                                                @else
                                                    
                                                @endif
                                                {{-- <div class="card cartCardHeight my-2">
                                                    <div class="card-body row">
                                                        <div class="col-md-4 col-sm-4 col-12">
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
                                                </div> --}}
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
                                        @if(count($myCart) > 0)
                                            {{-- @foreach($myCart as $cart)
                                                @if($cart->order_status_id === 0) --}}
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
                                                {{-- @else 
                                                     --}}
                                                {{-- @endif   
                                            @endforeach --}}
                                            {{-- <div class="card totalCartHeight my-2">
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
                                                        </button> --}}
                                                    {{-- <form method="POST" action="dashboard/store/order">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="text" name="buyer_id" id="buyer_id" value="{{auth()->user()->id}}" hidden />
                                                            <button class="btn btn-block form-control btn-danger text-white text-center" type="submit" >
                                                                    <i class="fa fa-shopping-bag me-2"></i>Checkout</button>
                                                        </form> --}}
                                                    {{-- </div>
                                                </div>
                                            </div> --}}
                                        @endif
                                        <!-- The Add To Product Modal -->
                                        {{-- <form method="POST" action="/cart"> --}}
                                        <form method="POST" id="paymentForm" action="{{route('cart.update',auth()->user()->id)}}">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal fade shadow" id="checkOutModal" tabindex="-1" aria-labelledby="checkOutModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <!-- Modal body -->
                                                        {{-- @if(count($myCart)>0) --}}
                                                            {{-- @foreach ($myCart as $eachCart)
                                                                <input type="number" name="stock_id" id="stock_id" value="{{$eachCart->stock_id}}" hidden />
                                                            @endforeach --}}
                                                        {{-- @end if --}}
                                                        <div class="modal-body">
                                                            @if($carts)
                                                                <input type="text" name="amount" id="amount" value="{{$carts->sum('product_price')}}" hidden />
                                                            @else
                                                            @endif
                                                            <h5 class="fw-bold">Enter Address</h5>
                                                            <input type="number" name="buyer_id" id="buyer_id" value="{{auth()->user()->id}}" hidden />
                                                            <input type="email" name="buyer_email" id="buyer_email" value="{{auth()->user()->email}}" hidden />
                                                            @if(count($userAddress) > 0)
                                                                @foreach ($userAddress as $address)
                                                                    <div class="container-fliud">
                                                                        <div class="form-group">
                                                                            <label for="street_address" class="my-2">Street Address:</label>
                                                                            <input type="text" name="street_address" id="street_address" value="{{$address->street_address}}" class="form-control @error('street_address') is-invalid @enderror"
                                                                                required/>
                                                                            @error('street_address')
                                                                                <small class="invalid-feedback" role="alert">
                                                                                    {{ $message }}
                                                                                </small>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-6 form-group">
                                                                                <label for="city_address" class="my-2">City:</label>
                                                                                <input type="text" name="city_address" id="city_address" value="{{$address->city_address}}" class="form-control @error('city_address') is-invalid @enderror"
                                                                                    required/>
                                                                                @error('city_address')
                                                                                    <small class="invalid-feedback" role="alert">
                                                                                        {{ $message }}
                                                                                    </small>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-6 form-group">
                                                                                <label for="state_address" class="my-2">State:</label>
                                                                                <input type="text" name="state_address" id="state_address" value="{{$address->state_address}}" class="form-control @error('state_address') is-invalid @enderror"
                                                                                    required/>
                                                                                @error('state_address')
                                                                                    <small class="invalid-feedback" role="alert">
                                                                                        {{ $message }}
                                                                                    </small>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-3">
                                                                            <div class="col-6 form-group">
                                                                                <label for="country_address" class="my-2">Country:</label>
                                                                                <input type="text" name="country_address" id="country_address" value="{{$address->country_address}}" class="form-control @error('country_address') is-invalid @enderror"
                                                                                    required/>
                                                                                @error('country_address')
                                                                                    <small class="invalid-feedback" role="alert">
                                                                                        {{ $message }}
                                                                                    </small>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="col-6 form-group">
                                                                                <label for="zip_code" class="my-2">Zip:</label>
                                                                                <input type="number" name="zip_code" id="zip_code" value="{{$address->zip_code}}" class="form-control @error('zip_code') is-invalid @enderror"
                                                                                required/>
                                                                                @error('zip_code')
                                                                                    <small class="invalid-feedback" role="alert">
                                                                                        {{ $message }}
                                                                                    </small>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 form-group">
                                                                            <button class="btn btn-block form-control btn-danger text-white text-center" type="submit" >
                                                                                <i class="fa fa-shopping-bag me-2"></i>Checkout to Pay On-Delivery</button>
                                                                        </div>
                                                                        {{-- <h5 class="text-center mt-2">OR</h5>
                                                                        <div class="row">
                                                                            <p class="text-center"><small>Make your payments now</small></p>
                                                                            <div class="col-4 form-group">
                                                                                <button class="btn btn-block form-control border border-success shadow text-center text-success">
                                                                                    <i class="fa fa-google-wallet"></i>Checkout with Wallet</button>
                                                                            </div>
                                                                            <div class="col-4 form-group">
                                                                                <button class="btn btn-block form-control border border-primary shadow text-center text-primary">
                                                                                    <i class="fa fa-paypal"></i>Checkout with Paypal</button>
                                                                            </div>
                                                                            <div class="col-4 form-group">
                                                                                <button class="btn btn-block form-control border border-danger shadow text-center text-danger" >
                                                                                    <span class="col-4"><i class="fa fa-credit-card"></i></span><span class="col-8">Checkout with Card</span></button>
                                                                            </div>
                                                                        </div> --}}
                                                                        
                                                                    </div>
                                                                @endforeach
                                                            @else
                                                                <div class="container-fliud">
                                                                    <div class="form-group">
                                                                        <label for="street_address" class="my-2">Street Address:</label>
                                                                        <input type="text" name="street_address" id="street_address" class="form-control @error('street_address') is-invalid @enderror"
                                                                            required/>
                                                                        @error('street_address')
                                                                            <small class="invalid-feedback" role="alert">
                                                                                {{ $message }}
                                                                            </small>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-6 form-group">
                                                                            <label for="city_address" class="my-2">City:</label>
                                                                            <input type="text" name="city_address" id="city_address" class="form-control @error('city_address') is-invalid @enderror"
                                                                                required/>
                                                                            @error('city_address')
                                                                                <small class="invalid-feedback" role="alert">
                                                                                    {{ $message }}
                                                                                </small>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-6 form-group">
                                                                            <label for="state_address" class="my-2">State:</label>
                                                                            <input type="text" name="state_address" id="state_address" class="form-control @error('state_address') is-invalid @enderror"
                                                                                required/>
                                                                            @error('state_address')
                                                                                <small class="invalid-feedback" role="alert">
                                                                                    {{ $message }}
                                                                                </small>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <div class="col-6 form-group">
                                                                            <label for="country_address" class="my-2">Country:</label>
                                                                            <input type="text" name="country_address" id="country_address" class="form-control @error('country_address') is-invalid @enderror"
                                                                                required/>
                                                                            @error('country_address')
                                                                                <small class="invalid-feedback" role="alert">
                                                                                    {{ $message }}
                                                                                </small>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-6 form-group">
                                                                            <label for="zip_code" class="my-2">Zip:</label>
                                                                            <input type="number" name="zip_code" id="zip_code" class="form-control @error('zip_code') is-invalid @enderror"
                                                                            required/>
                                                                            @error('zip_code')
                                                                                <small class="invalid-feedback" role="alert">
                                                                                    {{ $message }}
                                                                                </small>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 form-group">
                                                                        <button class="btn btn-block form-control btn-danger text-white text-center" type="submit" >
                                                                            <small><i class="fa fa-shopping-bag me-2"></i>Checkout</small></button>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            
                                                            <h5 class="text-center mt-2">OR</h5>
                                                            <div class="row">
                                                                <p class="text-center"><small>Make your payments now</small></p>
                                                                <div class="col-4 form-group">
                                                                    <button type="button" class="btn btn-block btn-success form-control shadow text-center" onclick="payWithPaystack(event)">
                                                                        <small><i class="mx-2 text-light fa fa-google-wallet"></i>With Paystack</small></button>
                                                                </div>
                                                                <div class="col-4 form-group">
                                                                    {{-- <a href="https://www.paypal.com/in/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/in/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-200px.png" border="0" alt="PayPal Logo"></a> --}}
                                                                    <button type="button" class="btn btn-block btn-primary form-control shadow text-center">
                                                                        <small><i class="mx-2 text-light fa fa-paypal"></i>With Paypal</button></small>
                                                                </div>
                                                                <div class="col-4 form-group">
                                                                    <button type="button" class="btn btn-block form-control btn-danger shadow text-center">
                                                                        <small><i class="mx-2 text-light fa fa-credit-card"></i>With Amazon</a></small>
                                                                </div>
                                                            </div>
                                                            {{-- <div class="input-group mb-3">
                                                                <div class="input-group-text">
                                                                    <input class="form-check-input mt-0" type="radio" value="" aria-label="Checkbox for following text input">
                                                                </div>
                                                                <input type="text" class="form-control" aria-label="Text input with checkbox">
                                                            </div>
                                                              
                                                            <div class="input-group">
                                                                <div class="input-group-text">
                                                                    <input class="form-check-input mt-0" type="radio" value="" aria-label="Radio button for following text input">
                                                                </div>
                                                                <input type="text" class="form-control" aria-label="Text input with radio button">
                                                            </div> --}}
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
        <script src="https://js.paystack.co/v1/inline.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            const paymentForm = document.getElementById('paymentForm');
            paymentForm.addEventListener("submit", payWithPaystack, false);
            function payWithPaystack(e){
                e.preventDefault();
                console.log("User email to pay " +document.getElementById("buyer_email").value);
                console.log("Amount to be paid " +document.getElementById("amount").value);
                let handler = PaystackPop.setup({
                    key: 'pk_test_836f27d95f58c27cc2b39124208dcebd09121dd8', // Replace with your public key
                    email: document.getElementById("buyer_email").value,
                    amount: document.getElementById("amount").value * 100,
                    ref: ''+Math.floor((Math.random() * 1000000000) + 1),  // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                    // label: "Optional string that replaces customer email"
                    onClose: function(){
                        alert('Window closed.');
                    },
                    callback: function(response){
                        let reference = response.reference;
                        $.ajax({
                            type: "GET",
                            url: "{{url('verify-payment')}}/"+reference,
                            // uploadUrl: '{{url("product/create")}}',
                            // data: {
                            //     reference
                            // },
                            success: function (response){
                                console.log(response);
                                if(resonse[0].status == true){
                                    $('form').prepend(`
                                        <h2>{response[0].message}</h2>
                                    `);
                                }else{
                                    $('form').prepend(`
                                        <h2>Failed to verify payment</h2>
                                    `);
                                }
                            }
                        });
                        // let message = 'Payment complete! Reference: ' + response.reference;
                        // alert(message);
                    }
                });
                handler.openIframe();
            }
            // function payWithPaystack(){
            //   var handler = PaystackPop.setup({
            //     key: 'pk_test_836f27d95f58c27cc2b39124208dcebd09121dd8',
            //     email: 'customer@email.com',
            //     amount: 10000,
            //     ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
            //     metadata: {
            //        custom_fields: [
            //           {
            //               display_name: "Mobile Number",
            //               variable_name: "mobile_number",
            //               value: "+2348012345678"
            //           }
            //        ]
            //     },
            //     callback: function(response){
            //         alert('success. transaction ref is ' + response.reference);
            //     },
            //     onClose: function(){
            //         alert('window closed');
            //     }
            //   });
            //   handler.openIframe();
            // }
          </script>
    @endsection
