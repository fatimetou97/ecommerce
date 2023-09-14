
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

            <button
            onclick="location.href='{{ url('/web/add_product_attribute/'.$product_id) }}'"
            type="button" class="btn bg-gradient-secondary w-auto me-2">
                <i class="bi bi-plus-circle"></i>
            </button>
          <div class="card mb-4">
               @if (session()->has('success'))
                   @include('success_toast')
               @elseif (session()->has('error'))
                   @include('error_toast')
               @endif

            <div class="card-body px-0 pt-0 pb-2 ">
              <div class="table-responsive p-0">
                <td>
                    <div class="d-flex px-2 py-1">
                      <div>
                        <img src={{asset('assets/img/image1.jpg')}} class="avatar avatar-md me-3" alt="product">

                      </div>

                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{$product->name}}</h6>
                        <p class="text-xs text-secondary mb-1">{{$product->category->name}}</p>
                      <p class="text-xs text-secondary mb-0">{{$product->price}} {{Str::upper($product->currency)}}</p>

                      </div>
                    </div>
                  </td>
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>

                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Variations</th>

                      <th class="text-secondary opacity-7">Action</th>
                    </tr>
                  </thead>

                  <tbody>
             @foreach($product_attributes as $item)


             <tr>

                <td>
                    <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">
                        {{$item->name}}</h6>
              <p class="text-xs text-secondary mb-1">
                 {{$item->attribute->name}}</p>
                        </div>
                    </div>
                  </td>


                <td class="align-middle">

              <a data-bs-toggle="modal" data-bs-target="#deleteproductattributeModal{{$item->id}}"
                title="Delete attribute">
                <button  class="btn bg-gradient-danger w-auto me-2"><i class="bi bi-trash"></i></button>
              </a>


                </td>
          @include('products.delete_product_attribute')

              </tr>




              @endforeach
                  </tbody>



                </table>

                <div class="d-flex justify-content-center">
                 {!! $product_attributes->links() !!}
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
