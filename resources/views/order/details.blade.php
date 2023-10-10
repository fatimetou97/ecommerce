@include('header')

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
 @include('sidebar')
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
  @include('navbar')
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-8">
          <div class="row">
            <div class="col-xl-6 mb-xl-0 mb-4">
              <div class="card bg-transparent shadow-xl">
                <div class="overflow-hidden position-relative border-radius-xl" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/card-visa.jpg');">
                  <span class="mask bg-gradient-dark"></span>
                  <div class="card-body position-relative z-index-1 p-3">
                    <i class="bi bi-geo-alt text-white p-2"></i>
                    {{-- <i class="bi bi-truck text-white p-2"></i> --}}
                    {{date('d-m-y',strtotime($order->created_at))}}
                    <div class="d-flex">
                      <div class="d-flex">
                        <div class="me-4">
                          <p class="text-white text-sm opacity-8 mb-0">Localisation</p>
                          <h6 class="text-white mb-0">{{$order->city->name}}</h6>
                        </div>
                        <div>
                          <p class="text-white text-sm opacity-8 mb-0">Shipping</p>
                          <h6 class="text-white mb-0">{{$order->shipping->price}}  {{Str::upper($order->currency)}}</h6>

                        </div>

                      </div>

                      <div class="ms-auto w-20 d-flex align-items-end justify-content-end">
                        <img class="w-60 mt-2" src={{asset('assets/img/logos/mastercard.png') }} alt="logo">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6">
              <div class="row">
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-header mx-4 p-1 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                        {{-- <i class="fas fa-landmark opacity-10"></i> --}}
                        <i class="bi bi-currency-dollar opacity-10"></i>
                      </div>
                    </div>
                    <div class="card-body pt-0 p-1 text-center">
                      <p class="text-center mb-0 ">SubTotal</p>
                      <span class="text-xs text-warning">Discount</span>
                      @if (!is_null($order->discount))
                     <p class="text-xs"> {{$order->discount->discount}} {{$order->discount->type=="fixed"?Str::upper($order->currency):"%"}} </p>
                     @else
                     <p class="text-xs"> 0</p>

                     @endif
                      <hr class="horizontal dark my-1">
                      <p class="mb-0 text-sm badge text-bg-info">{{$order->subtotal}} </p>
                      <p class="text-xs text-secondary mb-0">{{Str::upper($order->currency)}} </p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mt-md-0 mt-4">
                  <div class="card">
                    <div class="card-header mx-4 p-1 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                        {{-- <i class="fab fa-paypal opacity-10"></i> --}}

                        <i class="bi bi-currency-dollar opacity-10"></i>
                      </div>
                    </div>
                    <div class="card-body pt-0 p-1 text-center">
                      <p class="text-center mb-0">Total</p>
                      <div style="height: 40px"></div>
                      {{-- <span class="text-xs">Below, Order Total</span> --}}
                      <hr class="horizontal dark my-2">
                      <p class="mb-0 text-sm badge text-bg-info">{{$order->total}}</p>
                      <p class="text-xs text-secondary mb-0">{{Str::upper($order->currency)}}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-12 mb-lg-0 mb-4">
                @if (session()->has('success'))
                @include('success_toast')
            @elseif (session()->has('error'))
                @include('error_toast')
            @endif

                <form action="{{url('/web/order_details/'.$order->id)}}" method="post">
                    {{ csrf_field() }}
              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Order Status</h6>
                    </div>
                    <div class="col-6 text-end">
                      <button type="submit"
                       class="btn bg-gradient-dark mb-0"
                        ><i class="bi bi-pencil-square"></i>&nbsp;&nbsp;Submit</button>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3">
                  <div class="row">

                    <div class="col-md-6">
                      <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                        <img class="w-10 me-3 mb-0" src={{asset('assets/img/status.png')}} alt="status">
                      <select class="form-select" name="status">

                        <option {{$order->status=="ordered"?'selected':''}} value="ordered">Ordered</option>
                        <option {{$order->status=="delivered"?'selected':''}}value="delivered">Delivered</option>
                        <option {{$order->status=="canceled"?'selected':''}} value="canceled">Canceled</option>
                      </select>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
                </form>
            </div>


          </div>
        </div>
        <div class="col-lg-4">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-6 d-flex align-items-center">
                  <h6 class="mb-0">Items</h6>
                </div>
                @if (count($order->order_items)>=5)
                <div class="col-6 text-end">
                    <a href={{url('/web/list_order_items/'.$order->id)}}>
                  <button class="btn btn-outline-primary btn-sm mb-0">View All</button>
                </a>
                </div>
                @endif
              </div>
            </div>
            <div class="card-body p-3 pb-0">
              <ul class="list-group">
                {{-- @foreach (range(0,count($order->order_items)-(count($order->order_items)-5)) as $item ) --}}
            @if (count($order->order_items)>=5)

                @for($i=count($order->order_items)-(count($order->order_items)-5);$i>=0;$i--)
                <?php    $item=$order->order_items[$i]?>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                    <a data-bs-toggle="modal" data-bs-target="#attributesModal{{$item->product->id}}" title="variations">
                   <i class="bi bi-magic"></i>
                  </a>
               <div class="d-flex flex-column">

                   <a href={{url('/web/attributes_product/'.$item->product->id)}} >
                 <p class="mb-0 text-dark font-weight-bold text-xs badge text-bg-info">{{$item->product->name}}</p>
               </a>
                <span class="text-xs text-success">{{$item->product->price}} {{$item->product->currency}}</span>
               </div>
               <div class="d-flex align-items-center text-sm">
                 {{$item->quantity}}
                 <p class=" text-primary text-sm mb-0 px-0 ms-4">
                     {{$item->product->price*$item->quantity}}
                     {{$item->product->currency}}
                 </p>

               </div>

             </li>
             @include('order.order_attributes')
               @endfor


           @else
         @foreach ($order->order_items as $item )
      <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
         <a data-bs-toggle="modal" data-bs-target="#attributesModal{{$item->product->id}}" title="variations">
        <i class="bi bi-magic"></i>
       </a>
    <div class="d-flex flex-column">

        <a href={{url('/web/attributes_product/'.$item->product->id)}} >
      <p class="mb-0 text-dark font-weight-bold text-xs badge text-bg-info">{{$item->product->name}}</p>
    </a>
     <span class="text-xs text-success">{{$item->product->price}} {{$item->product->currency}}</span>
    </div>
    <div class="d-flex align-items-center text-sm">
      {{$item->quantity}}
      <p class=" text-primary text-sm mb-0 px-0 ms-4">
          {{$item->product->price*$item->quantity}}
          {{$item->product->currency}}
      </p>

    </div>

  </li>
  @include('order.order_attributes')
@endforeach
@endif

              </ul>
            </div>
          </div>
        </div>
      </div>
      {{-- ////noteee --}}
      <div class="row">
        <div class="col-md-7 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Note</h6>
            </div>
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    {{$order->note}}
                    {{-- <h6 class="mb-3 text-sm">Oliver Liam</h6>
                    <span class="mb-2 text-xs">Company Name: <span class="text-dark font-weight-bold ms-sm-2">Viking Burrito</span></span>
                    <span class="mb-2 text-xs">Email Address: <span class="text-dark ms-sm-2 font-weight-bold">oliver@burrito.com</span></span>
                    <span class="text-xs">VAT Number: <span class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
                  --}}
                </div>

                </li>

              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-5 mt-4">
          <div class="card h-100 mb-4">
            <div class="card-header pb-0 px-3">
              <div class="row">
                <div class="col-md-6">
                  <h6 class="mb-0">Customer</h6>
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                  <i class="far fa-calendar-alt me-2"></i>
                  <small>{{date('d-m-y',strtotime($order->created_at))}}</small>
                </div>
              </div>
            </div>
            <div class="card-body pt-4 p-3">
              <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Info</h6>
              @if (!is_null($order->customer))


              <ul class="list-group">
                <li class="list-group-item border-0 d-flex
                 justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only  btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">
                     <i class="bi bi-person"></i>
                    </button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">{{$order->customer->first_name}}</h6>
                      <span class="text-xs">{{$order->customer->last_name}}</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                    {{$order->customer->phone}}
                  </div>
                </li>
                @if (!is_null( $order->customer->email))
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">
                        <i class="bi bi-envelope"></i>
                    </button>
                    <div class="d-flex flex-column">

                     <h6 class="mb-1 text-dark text-sm">{{$order->customer->email}}</h6>


                    </div>
                  </div>

                </li>
                @endif
              </ul>
              @else
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex
                 justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only  btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">
                     <i class="bi bi-person"></i>
                    </button>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm">{{$order->firstname}}</h6>
                      <span class="text-xs">{{$order->lastname}}</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                    {{$order->mobie}}
                  </div>
                </li>
                @if (!is_null( $order->email))
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">
                        <i class="bi bi-envelope"></i>
                    </button>
                    <div class="d-flex flex-column">

                     <h6 class="mb-1 text-dark text-sm">{{$order->email}}</h6>


                    </div>
                  </div>

                </li>
                @endif
              </ul>
              @endif
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
