@include('header')

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
@include('sidebar')
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
  @include('navbar')
    <!-- End Navbar -->
    <div class="container-fluid py-3">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8">
                      <div class="numbers">
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Sales</p>
                        <h5 class="font-weight-bolder">
                         {{$orders_now}} <span class="text-success text-sm ">{{Str::upper($currency)}}
                         </span>
                        </h5>
                        <p class="mb-0">
                          For Today
                        </p>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">


                        <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="col-8">
                    <div class="numbers">
                      <p class="text-sm mb-0 text-uppercase font-weight-bold">Sales</p>
                      <h5 class="font-weight-bolder">
                       {{$orders}} <span class="text-success text-sm ">{{Str::upper($currency)}}
                       </span>
                      </h5>
                      <p class="mb-0">
                        For last month
                      </p>
                    </div>
                  </div>
                  <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                      <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
{{-- total orders today --}}
<div class="col-xl-3 col-sm-6">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-uppercase font-weight-bold">Sales</p>
              <h5 class="font-weight-bolder">
              {{$total_orders_today}} <span class="text-success text-sm ">
               </span>
              </h5>
              <p class="mb-0">
                For Today
              </p>

            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
              <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
{{-- //total orders this last month --}}
<div class="col-xl-3 col-sm-6">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-uppercase font-weight-bold">Sales</p>
              <h5 class="font-weight-bolder">
             {{$total_orders_month}} <span class="text-success text-sm ">
               </span>
              </h5>
              <p class="mb-0">
                For last month
              </p>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
              <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
      </div>


{{-- //row 222 --}}

 <div class="row mt-1">
    {{-- //total orders --}}
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-uppercase font-weight-bold">total sales</p>
                  <h5 class="font-weight-bolder">
                   {{$total}}
                  </h5>
                  <p class=" mb-0 mt-0">

                  </p>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

          <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Users</p>
                    <h5 class="font-weight-bolder">
                     {{$users}}
                    </h5>
                    <p class=" mb-0 mt-0">

                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Customers</p>
                    <h5 class="font-weight-bolder">
                    {{$customers}}
                    </h5>
                    <p class="mb-0">
                      {{-- <span class="text-danger text-sm font-weight-bolder">-2%</span>
                      since last quarter
                    </p> --}}
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



      </div>
{{-- //country --}}

      <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
          <div class="card ">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h6 class="mb-2">Sales by City</h6>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center ">
                <tbody>
                    @foreach ($cities as $city)


                  <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                        <div>
                          <img src={{asset('assets/img/city.png')}} alt="City flag" width="40px" height="40px">
                        </div>
                        <div class="ms-4">
                          <p class="text-xs font-weight-bold mb-0">City:</p>
                          <h6 class="text-sm mb-0">{{$city->name}}</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Sales:</p>
                        <h6 class="text-sm mb-0">{{$city->orders->count()}}</h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Value:</p>
                        <h6 class="text-sm mb-0">{{$city->orders->sum('total')}}</h6>
                      </div>
                    </td>
                    <td class="align-middle text-sm">
                      <div class="col text-center">
                        <p class="text-xs font-weight-bold mb-0">Currency</p>
                        <h6 class="text-sm mb-0">{{Str::upper($currency)}}</h6>
                      </div>
                    </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="card">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Sales By Status</h6>
            </div>
            <div class="card-body p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm me-3 bg-gradient-success shadow text-center">
                      {{-- <i class="ni ni-mobile-button text-white opacity-10"></i> --}}

                      <i class="bi bi-cart-check-fill text-lg opacity-10" aria-hidden="true"></i>
                    </div>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">Delivred</h6>
                      <span class="text-xs">Today  :<span class="font-weight-bold">{{$orders_now_delivered }}</span></span>
                      <span class="text-xs">Last Month  :<span class="font-weight-bold">{{$orders_month_delivered }}</span></span>
                      <span class="text-xs">Year  :<span class="font-weight-bold">{{$orders_year_delivered }}</span></span>
                    </div>
                  </div>

                </li>

                  <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex align-items-center">
                      <div class="icon icon-shape icon-sm me-3 bg-gradient-warning shadow text-center">
                        {{-- <i class="ni ni-mobile-button text-white opacity-10"></i> --}}
                        <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                      </div>
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm">Ordered</h6>
                        <span class="text-xs">Today :<span class="font-weight-bold">{{$orders_now_ordered}}</span></span>
                        <span class="text-xs">Last Month :<span class="font-weight-bold">{{$orders_month_ordered}}</span></span>
                        <span class="text-xs">Last Year :<span class="font-weight-bold">{{$orders_year_ordered}}</span></span>

                    </div>
                    </div>

                  </li>
                  <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <div class="d-flex align-items-center">
                      <div class="icon icon-shape icon-sm me-3 bg-gradient-danger shadow text-center">
                        <i class="bi bi-cart-x-fill text-lg opacity-10"></i>
                      </div>
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm">Cancelled</h6>
                        <span class="text-xs">Today :<span class="font-weight-bold">{{$orders_now_cancelled }}</span></span>
                        <span class="text-xs">Last Month :<span class="font-weight-bold">{{$orders_month_cancelled }}</span></span>
                        <span class="text-xs">Last Year :<span class="font-weight-bold">{{$orders_year_cancelled }}</span></span>
                      </div>
                    </div>

                  </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
   @include('footer')
    </div>
  </main>
@include('settings')
  <!--   Core JS Files   -->
@include('scripts')
</body>

</html>
