
@include('header')
<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
@include('sidebar')
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
   @include('navbar')
    <!-- End Navbar -->

    <div class="container-fluid py-4">


        <div class="col-6">

          <div class="card mb-4">

            <div class="card-body px-0 pt-0 pb-2 ">
              <div class="table-responsive p-0">

                    <div class="card h-100">
                      <div class="card-header pb-0 p-3">
                        <div class="row">
                          <div class="col-6 d-flex align-items-center">
                            <h6 class="mb-0">Items</h6>
                          </div>

                        </div>
                      </div>
                      <div class="card-body p-3 pb-0">
                        <ul class="list-group">
                          {{-- @foreach (range(0,count($order->order_items)-(count($order->order_items)-5)) as $item ) --}}

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


                        </ul>
                      </div>

                  </div>
                </div>


              </div>
            </div>
          </div>
        </div>


    </div>
    @include('footer')
    <br><br>
  </main>
@include('settings')
  <!--   Core JS Files   -->
@include('scripts')
</body>

</html>
