<aside
 class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <div class="navbar-brand m-0"
    >
        <img src={{asset('assets/img/shopping.jpg')}} class="navbar-brand-img h-150" alt="main_logo">
        <span class="ms-1 font-weight-bold">SayerCom</span>
    </div>

    </div>
    <hr class="horizontal dark mt-0">

    <div class="collapse navbar-collapse w-auto h-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link linkclass"  href="{{url('/dashboard')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link linkclass " href="{{url('/web/categories')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              {{-- <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i> --}}
              <i class="bi bi-columns-gap text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Categories</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{url('/web/products')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Products</span>
          </a>
        </li>
        <li class="nav-item">
            {{-- dropdown-toggle --}}
            <a class="nav-link   "
            id="dropdownMenuButton1" href="{{url('/web/attributes')}}" >
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">

                <i class="bi bi-magic text-danger text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1" >Attributes</span>
             </a>

            {{-- <ul class="dropdown-menu px-5 py-1 mt-0 ml-5" aria-labelledby="dropdownMenuButton1">

                  <li>  <a class="nav-link "
                    href="{{url('/web/attributes')}}"
                    >
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2  d-flex align-items-center justify-content-center">
                        <i class="ni ni-credit-card text-danger text-sm opacity-10"></i>
                      </div>
                      <span class="nav-link-text ms-1">Attributes</span> </a>
                 </li>
                 <li>  <a class="nav-link "
                    >
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2  d-flex align-items-center justify-content-center">
                        <i class="ni ni-credit-card text-danger text-sm opacity-10"></i>
                      </div>
                      <span class="nav-link-text ms-1">Product Attribute </span> </a>
                 </li>
              </ul> --}}
          </li>




          <li class="nav-item">
          <a class="nav-link " href={{url('web/orders')}}>
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">

              <i class="bi bi-bag-check-fill text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Orders</span>
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href={{url('web/cities')}}>
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">

                <i class="bi bi-geo-alt text-info text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Cities</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href={{url('web/shippings')}}>
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">

                <i class="bi bi-truck-front-fill text-dark text-sm opacity-10"></i>
              </div>
              <span class="nav-link-text ms-1">Shippings</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href={{url('web/customers')}}>
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">

                <i class="bi bi-person-check text-secondary text-sm opacity-10 " style="height: 30px"></i>
                <i class="bi bi-person-fill-add text-secondary text-sm opacity-10 "></i>
              </div>
              <span class="nav-link-text ms-1">Customers</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href={{url('web/discounts')}}>
              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">


                <i class="bi bi-percent text-sm opacity-10 text-danger "></i>
              </div>
              <span class="nav-link-text ms-1">Discounts</span>
            </a>
          </li>
        <li class="nav-item">
          <a class="nav-link " href="">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">RTL</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>


      </ul>
    </div>
    <!-- <div class="sidenav-footer mx-3 ">
      <div class="card card-plain shadow-none" id="sidenavCard">
        <img class="w-50 mx-auto" src="./assets/img/illustrations/icon-documentation.svg" alt="sidebar_illustration">
        <div class="card-body text-center p-3 w-100 pt-0">
          <div class="docs-info">
            <h6 class="mb-0">Need help?</h6>
            <p class="text-xs font-weight-bold mb-0">Please check our docs</p>
          </div>
        </div>
      </div>
      <a href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard" target="_blank" class="btn btn-dark btn-sm w-100 mb-3">Documentation</a>
      <a class="btn btn-primary btn-sm mb-0 w-100" href="https://www.creative-tim.com/product/argon-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
    </div> -->



  </aside>
