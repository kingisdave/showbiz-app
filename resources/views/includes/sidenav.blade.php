    <div class="wrapper container-fluid" id="conta">
		<div class="container-fluid" id='mySidenav'>
			<div class="sidebar">
				<ul>
                    <li>
                        <a href="/dashboard" class="active">
							<span class="icon">
								<i class="fa fa-home" aria-hidden="true"></i>
                            </span>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
					<li>
                        <a href="/dashboard/blog">
							<span class="icon">
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                            </span>
                            <span class="title">Posts</span>
                        </a>
                    </li>
					<li>
                        <a href="/dashboard/store">
							<span class="icon">
								<i class="fa fa-building-o" aria-hidden="true"></i>
                            </span>
                            <span class="title">Your Store</span>
                        </a>
                    </li>
					<li>
                        <a href="#">
							<span class="icon">
								<i class="fa fa-user" aria-hidden="true"></i>
                            </span>
                            <span class="title">Your Wallet</span>
                        </a>
                    </li>
					<li>
                        <a href="#">
							<span class="icon">
								<i class="fa fa-bar-chart" aria-hidden="true"></i>
                            </span>
                            <span class="title">Analytics</span>
						</a>
                    </li>
                    <li>
                        <a href="#">
							<span class="icon">
								<i class="fa fa-gear" aria-hidden="true"></i>
                            </span>
                            <span class="title">Account Setting</span>
                        </a>
                    </li>
					<li>
                        <a href="#">
							<span class="icon">
								<i class="fa fa-history" aria-hidden="true"></i>
                            </span>
                            <span class="title">Update Policy</span>
                        </a>
                    </li>
				</ul>
				<div class="hamburger" id='mytoggler'>
					<div></div>
					<div></div>
					<div></div>
				</div>
			</div>
		</div>
		{{-- <div class="main_container">
            <div class="d-flex" id="dashboardTopNav" style="background: #0066cc; box-shadow: 2px 0px 3px #000;">
                <a href="#" class="me-auto" id="topbrand">
                    <img src="./assets/images/flash-banner.png" class="bannerImg me-auto" alt="banner" width="170" height="70" />
                </a>
                <ul class="nav m-2">
                    <form class="navbar-form navbar-left m-2 d-none d-sm-inline">
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" />
                        <div class="input-group-btn">
                          <button class="btn btn-outline-danger bg-light border" type="submit">
                            <i class="fa fa-search text-dark"></i>
                          </button>
                        </div>
                      </div>
                    </form>
                    <li class="nav-item dropdown m-2">
                        <a class="nav-brand dropdown-toggle text-light" href="#" id="dropNavLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="h4 fa fa-user-circle"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropNavLink">
                            <h5 class="dropdown-header">Dashboard</h5>
                            <a class="dropdown-item" href="#">Profile</a>
                            <a class="dropdown-item" href="#">Setting</a>
                            <div class="dropdown-divider"></div>
                            <h5 class="dropdown-header">Videos</h5>
                            <a class="dropdown-item" href="#">Links</a>
                            <a class="dropdown-item" href="#">Privacy</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Log Out</a>
                        </div>
                    </li>      	
                </ul>
            </div>
			<div class="container-fluid dashboardBorder pt-2">
                <h3 class="fw-bold mt-2">Dashboard</h3>
                <p class="fst-italic">Welcome User to your dashboard.</p>
                <hr />
                <h5>Complete Overview</h5>
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="card m-1 shadow overviewCard">
                           <h4 class="fw-bolder lh-1 ">0</h4>
                           <p class="small lh-1">Your Blogs</p> 
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="card m-1 shadow overviewCard">
                            <h4 class="fw-bolder lh-1 ">0</h4>
                            <p class="small lh-1">Store Items</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="card m-1 shadow overviewCard">
                            <h4 class="fw-bolder lh-1 ">0</h4>
                            <p class="small lh-1">Comments</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-12">
                        <div class="card m-1 shadow overviewCard">
                            <h4 class="fw-bolder">Account Details</h4>
                            <p class="small lh-1 fst-italic">
                                <a href="#" class="text-decoration-underline"><small>Click to update your account profile</small></a>
                            </p>
                        </div>        
                    </div>
                </div>
                <hr />
                <div class="container-fluid">
                    <h5>Notifications</h5>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-12">
                            <div class="card my-2 mx-1 shadow p-2 notifyCard">
                                <div class="d-flex align-content-start justify-content-start">
                                    <p class="text-danger small"><i class="fa fa-circle me-2"></i>New</p>
                                    <p class="ms-auto text-muted"><small>24th March</small></p>
                                </div>
                                <div class="text-center text-wrap">
                                    <p class="fw-bold">Shop Request</p>
                                </div>
                                <div class="d-flex text-wrap">
                                    <img src="./assets/images/female.jpg" alt="mypics" class="rounded-circle" width="35" height="35" />
                                    <p class="fw-bold ms-3 mt-1">Named Username</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-12">
                            <div class="card my-2 mx-1 shadow p-2 notifyCard">
                                <div class="d-flex align-content-start justify-content-start">
                                    <p class="text-danger small"><i class="fa fa-circle me-2"></i>New</p>
                                    <p class="ms-auto text-muted"><small>24th March</small></p>
                                </div>
                                <div class="text-center text-wrap">
                                    <p class="fw-bold">Shop Request</p>
                                </div>
                                <div class="d-flex text-wrap">
                                    <img src="./assets/images/female.jpg" alt="mypics" class="rounded-circle" width="35" height="35" />
                                    <p class="fw-bold ms-3 mt-1">Named Username</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-12">
                            <div class="card my-2 mx-1 shadow p-2 notifyCard">
                                <div class="d-flex align-content-start justify-content-start">
                                    <p class="text-danger small"><i class="fa fa-circle me-2"></i>New</p>
                                    <p class="ms-auto text-muted"><small>24th March</small></p>
                                </div>
                                <div class="text-center text-wrap">
                                    <p class="fw-bold">Blog Comment</p>
                                </div>
                                <div class="d-flex text-wrap">
                                    <img src="./assets/images/female.jpg" alt="mypics" class="rounded-circle" width="35" height="35" />
                                    <p class="fw-bold ms-3 mt-1">Named Username</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-12">
                            <div class="card my-2 mx-1 shadow p-2 notifyCard">
                                <div class="d-flex align-content-start justify-content-start">
                                    <p class="text-primary small"><i class="fa fa-circle me-2"></i>New</p>
                                    <p class="ms-auto text-muted"><small>24th March</small></p>
                                </div>
                                <div class="text-center text-wrap">
                                    <p class="fw-bold">Blog Comment</p>
                                </div>
                                <div class="d-flex text-wrap">
                                    <img src="./assets/images/female.jpg" alt="mypics" class="rounded-circle" width="35" height="35" />
                                    <p class="fw-bold ms-3 mt-1">Named Username</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-12">
                            <div class="card my-2 mx-1 shadow p-2 notifyCard">
                                <div class="d-flex align-content-start justify-content-start">
                                    <p class="text-danger small"><i class="fa fa-circle me-2"></i>New</p>
                                    <p class="ms-auto text-muted"><small>24th March</small></p>
                                </div>
                                <div class="text-center text-wrap">
                                    <p class="fw-bold">Shop Request</p>
                                </div>
                                <div class="d-flex text-wrap">
                                    <img src="./assets/images/female.jpg" alt="mypics" class="rounded-circle" width="35" height="35" />
                                    <p class="fw-bold ms-3 mt-1">Named Username</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-12">
                            <div class="card my-2 mx-1 shadow p-2 notifyCard">
                                <div class="d-flex align-content-start justify-content-start">
                                    <p class="text-danger small"><i class="fa fa-circle me-2"></i>New</p>
                                    <p class="ms-auto text-muted"><small>24th March</small></p>
                                </div>
                                <div class="text-center text-wrap">
                                    <p class="fw-bold">Shop Request</p>
                                </div>
                                <div class="d-flex text-wrap">
                                    <img src="./assets/images/female.jpg" alt="mypics" class="rounded-circle" width="35" height="35" />
                                    <p class="fw-bold ms-3 mt-1">Named Username</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-12">
                            <div class="card my-2 mx-1 shadow p-2 notifyCard">
                                <div class="d-flex align-content-start justify-content-start">
                                    <p class="text-danger small"><i class="fa fa-circle me-2"></i>New</p>
                                    <p class="ms-auto text-muted"><small>24th March</small></p>
                                </div>
                                <div class="text-center text-wrap">
                                    <p class="fw-bold">Blog Comment</p>
                                </div>
                                <div class="d-flex text-wrap">
                                    <img src="./assets/images/female.jpg" alt="mypics" class="rounded-circle" width="35" height="35" />
                                    <p class="fw-bold ms-3 mt-1">Named Username</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-12">
                            <div class="card my-2 mx-1 shadow p-2 notifyCard">
                                <div class="d-flex align-content-start justify-content-start">
                                    <p class="text-primary small"><i class="fa fa-circle me-2"></i>New</p>
                                    <p class="ms-auto text-muted"><small>24th March</small></p>
                                </div>
                                <div class="text-center text-wrap">
                                    <p class="fw-bold">Blog Comment</p>
                                </div>
                                <div class="d-flex text-wrap">
                                    <img src="./assets/images/female.jpg" alt="mypics" class="rounded-circle" width="35" height="35" />
                                    <p class="fw-bold ms-3 mt-1">Named Username</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- footer details -->
            {{-- <div class="footerDiv text-center">
                <p>@Showbiz &copy; 2021 </p>
            </div> --}}
		{{-- </div>
    </div> --}}
    <!-- <script src="../bootstrap-4.3.1/dist/popper.js"></script> -->
    {{-- <script src="../bootstrap-5.0.0-beta1-dist/js/bootstrap.bundle.min.js"></script> --}}
    {{-- <script src="assets/js/main.js"></script> --}}
    <script>
        document.getElementById('mytoggler').addEventListener('click', myFunc);		
        function myFunc(){
            var wrapper = document.querySelector('.wrapper');
            wrapper.classList.toggle('active');
        
        }
    </script>
{{-- </body>
</html> --}}