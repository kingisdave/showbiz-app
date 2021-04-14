<div class="d-flex" id="dashboardTopNav" style="background: #0066cc; box-shadow: 2px 0px 3px #000;">
    <a href="#" class="me-auto" id="topbrand">
        <img src="/images/flash-banner.png" class="bannerImg me-auto" alt="banner" width="170" height="70" />
    </a>
    <ul class="nav m-2">
        <li class="nav-item">
          <a href="/" class="nav-link text-light mt-2">Home</a>
        </li>
        <form class="navbar-form navbar-left mt-2 d-none d-sm-inline">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" />
            <div class="input-group-btn">
              <button class="btn btn-outline-danger bg-light border-0" type="submit">
                <i class="fa fa-search text-dark mt-1 mb-2"></i>
              </button>
            </div>
          </div>
        </form>
        <li class="nav-item dropdown m-2 mt-3">
            <a class="nav-brand dropdown-toggle text-light" href="#" id="dropNavLink" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->user_name }}
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
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>     
         	
    </ul>
</div>