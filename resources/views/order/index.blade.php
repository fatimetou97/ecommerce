
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

        <div class="col-12">

          <div class="card mb-4">
               @if (session()->has('success'))
                   @include('success_toast')
               @elseif (session()->has('error'))
                   @include('error_toast')
               @endif

            <div class="card-body px-0 pt-0 pb-2 ">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">At_Date</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Discount</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Items</th>

                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Customer</th>

                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>

                  <tbody>
             @foreach($orders as $item)
             <tr>
                <td>
                    <div class="d-flex px-2 py-1">

                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{$item->id}}</h6>

                      </div>
                    </div>
                  </td>
                <td>
                  <div class="d-flex px-2 py-1">

                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">   {{date('d-m-Y', strtotime($item->created_at))}}</h6>

                    </div>
                  </div>
                </td>
                <td class="align-middle text-center text-sm">
                    <p class="text-xs font-weight-bold mb-0">{{$item->total}}</p>
                    <p class="text-xs text-secondary mb-0">{{Str::upper($item->currency)}}</p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    @if (!is_null($item->discount))


                    <p class="text-xs font-weight-bold mb-0">{{$item->discount->discount}}</p>
                    <p class="text-xs text-secondary mb-0">{{$item->discount->type=="fixed"?Str::upper($item->currency):"%"}}</p>
                    @else
                    <p class="text-xs font-weight-bold mb-0">0</p>
                    @endif
                  </td>
                  <td class="align-middle text-center text-sm">
                    <p class="badge badge-sm bg-gradient-success">{{$item->status}}</p>
                  </td><td class="align-middle text-center text-sm">
                    <p class="text-secondary text-xs font-weight-bold">{{count($item->order_items)}}</p>
                  </td><td class="align-middle text-center text-sm">
                    @if (!is_null($item->customer))
                    <p class="text-secondary text-xs font-weight-bold">{{$item->customer->first_name}}</p>
                    @else
                    <p class="text-secondary text-xs font-weight-bold">{{$item->firstname}}</p>
                    @endif
                  </td>
            <td class="align-middle">
                <button
                onclick="location.href='{{ url('/web/order_details/'.$item->id) }}'"
                type="button" class="btn bg-gradient-info w-auto me-2">
                <i class="bi bi-info-circle"></i>
                 </button>
                <a data-bs-toggle="modal" data-bs-target="#deletecategoryModal{{$item->id}}"
                      title="Delete Category">
                  <button  class="btn bg-gradient-danger w-auto me-2"><i class="bi bi-trash"></i></button>
                 </a>
             </td>




                @include('category.delete')
              </tr>

             @endforeach
                  </tbody>



                </table>

                <div class="d-flex justify-content-center">
                    {!! $orders->links() !!}
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
