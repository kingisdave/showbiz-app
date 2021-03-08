@extends('layouts.app')

    @section('content')
        <div class="wrapper container-fluid" id="conta">
            @include('includes.sidenav')
            <div class="main_container">
                @include('includes.dashboardheader')
                <div class="container-fluid dashboardBorder pt-2">
                    <h4 class="fw-bolder mt-2">Store Section</h4>
                    <p class="small">This is the page for the details of your e-store</p>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-12">
                            <a href="/dashboard/store/order" class="text-reset">
                                <div class="card m-1 shadow ps-3 d-flex justify-content-center shopTopCard">
                                    <h4 class="fw-bolder lh-1">0</h4>
                                    <p class="small lh-1">Order</p> 
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6 col-12">
                            <a href="/dashboard/store/product" class="text-reset">
                                <div class="card m-1 shadow ps-3 d-flex justify-content-center shopTopCard">
                                    <h4 class="fw-bolder lh-1">0</h4>
                                    <p class="small lh-1">Product</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6 col-12">
                            <a href="/dashboard/store/stock" class="text-reset">
                                <div class="card m-1 shadow ps-3 d-flex justify-content-center shopTopCard">
                                    <h4 class="fw-bolder lh-1">0</h4>
                                    <p class="small lh-1">Stock</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3 col-sm-6 col-12">
                            <a href="/dashboard/store/customer" class="text-reset">
                                <div class="card m-1 shadow ps-3 d-flex justify-content-center shopTopCard">
                                    <h4 class="fw-bolder lh-1">0</h4>
                                    <p class="small lh-1">Customer</p>
                                </div>
                            </a>        
                        </div>
                        <!-- Click to add New product button -->									
                        <div class="fixed-bottom mb-5 me-5 p-4">
                            <button class="btn btn-primary rounded-circle float-end p-3 shadow" data-bs-toggle="modal" data-bs-target="#shopperModal" title="Product Add Button">
                                <span class="fa fa-plus"></span>
                            </button>
                        </div>
                        {{-- <button type="button" class="btn btn-primary addBtn text-white" data-bs-toggle="modal" data-bs-target="#shopperModal">Add new blog</button> --}}
                        {{-- <p><a href="./ecommerce.html" class="small">Click here to go to Blog page</a></p> --}}
                    </div>
                    <hr />
                    <div class="container-fluid">
                        @if (session('successMessage'))
                            <div class="alert alert-success logalert rounded-pill" role="alert">
                                {{ session('successMessage') }}
                            </div>   
                        @endif
                        <div class="row">
                            <div class="accordion col-md-8 col-sm-8 col-12" id="accordionExample">
                                <div class="accordion-item bg-light">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <strong>Store Categories</strong>
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="d-flex flex-wrap">
                                                @if(count($prodcats) > 0) 
                                                    @foreach($prodcats as $category)
                                                    <span class="badge bg-primary rounded-pill p-3 m-1 shadow">{{$category->product_category}}</span>   
                                                    @endforeach
                                                @else
                                                    <div class="alert alert-danger mx-auto">You currently have no category</div>
                                                @endif
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4 col-12">
                                <button class="btn btn-primary addBtn text-white m-1" data-bs-toggle="modal" data-bs-target="#productCatModal">Add Category</button>
                            </div>
                        </div>
                    </div>
                    <!-- The add new product category Modal -->
                    <div class="modal fade" id="productCatModal" tabindex="-1" aria-labelledby="productCatModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="container-fliud">
                                        <h5 class="text-center">Add New Category</h5>
                                        <div class="card m-1 border-0 shadow">
                                            <div class="card-body">
                                                <form class="row" method="POST" action="store/category">
                                                    @csrf
                                                    <div class="col-md-4 col-12 p-2">
                                                        New Category :
                                                    </div>
                                                    <div class="col-md-8 col-12 form-group p-2 mb-1">
                                                        <input type="text" name="product_category" class="form-control @error('product_category') is-invalid @enderror"
                                                            required autocomplete="product_category" placeholder="Cars, Houses, Clothes, Books..." />
                                                        @error('product_category')
                                                            <small class="invalid-feedback" role="alert">
                                                                {{ $message }}
                                                            </small>
                                                        @enderror
                                                    </div>
                                                    
                                                    <button class="btn btn-sm btn-primary float-right" type="submit">Add Category</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>


                    <!-- The add new blog Modal -->
                    <div class="modal fade" id="shopperModal" tabindex="-1" aria-labelledby="shopperModal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <small>Product photos (can attach more than one) for display</small>
                                    
                                    <form method="POST" action="store" class="clearfix" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <input type="file" class="form-control" name="stockImage[]" id="stockImages" multiple />
                                        <div class="row justify-content-center" id="my_preview"></div>
                                        {{-- @csrf
                                        <div class="card mt-2 border-0 imagesUploadCard galleryStock mt-1 p-4 mx-auto shadow">
                                            <input type="file" name="stockImage" class="selectImage" id="stockImages" />
                                            <div class="show-progress">

                                            </div>
                                            <div class="row justify-content-center" id="my_preview"></div>
                                        </div> --}}
                                        <div class="clearfix">
                                            <button type="submit" class="float-end btn btn-outline-primary" id="imageUpload"><i class="fa fa-upload me-2"></i>Upload</button>    
                                        </div>
                                    </form>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
                <!-- footer details -->
                @include('includes.footer')
            </div>
		</div>
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/myckeditor.js') }}"></script>
        <script>

            $(document).ready(function(){
			// $("#loadBtn").click(function(){
			// 	postImg.hidden=false;
			// });
                $("#stockImages").change(function(){
                    var checkImage = this.value;
                    var ext = checkImage.substring(checkImage.lastIndexOf('.') + 1).toLowerCase();
                    if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg"){
                        $('#my_preview').html("");
                        var total_file=document.getElementById('stockImages').files.length;
                        for(var i=0; i<total_file; i++){
                            $('#my_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"'/>");
                        }
                    } else{
                        alert("Please upload jpeg, jpg, png or gif file")
                    }
                });
                // $("#uploadGallery").submit(function(e){
                // 	e.preventDefault();
                //     var formData = new FormData();  
                //    append data to formdata 
                //     formData.append('image',data);
                // 	if (comment.value=="") {
                // 		aler.hidden=false;
                // 		return;
                // 	}
                // 	loader.hidden=false;
                //     $.ajaxSetup({
                //         headers: {
                //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //         }
                //     });
                //     console.log(this.value);
                // 	$.ajax({
                // 		url: 'http://127.0.0.1:8000/dashboard/store',
                // 		type: 'POST',
                //         // data: formData,
                // 		data: new FormData(this),
                // 		contentType: false,
                // 		cache:false,
                // 		processData:false,
                // 		success: function(data)
                // 		{
                // 			loader.hidden=true;
                //  			console.log(data);
                // 		}

                // 	});
                // })
			});
        </script>
    @endsection