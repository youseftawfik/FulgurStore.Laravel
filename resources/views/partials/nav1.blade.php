<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
       <a class="navbar-brand brand-logo mr-5" href="{{URL::to('/')}}"><img src="{{asset('back/images/logo.png')}}" class="mr-2" alt="logo"/></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="fas fa-angle-double-left"></span>
      </button>
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item nav-profile dropdown">
          <a class="nav-link" href="#" data-toggle="dropdown" id="profileDropdown">
             <img src="{{asset('back/images/profile.png')}}" alt="profile"/>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            <a class="dropdown-item" href="{{URL::to('/loginout')}}">
              <i class="fas fa-power-off"></i>
              Logout
            </a>
          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="fas fa-bars"></span>
      </button>
    </div>
  </nav>