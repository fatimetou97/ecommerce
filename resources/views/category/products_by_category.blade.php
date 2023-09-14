
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
            {{-- <button
            onclick="location.href='{{ url('/web/add_product') }}'"
            type="button" class="btn bg-gradient-secondary w-auto me-2">
                <i class="bi bi-plus-circle"></i>
            </button> --}}
          <div class="card mb-4">
            <div class="card-header pb-0">
                @if (session()->has('success'))
                @include('success_toast')
                 @elseif (session()->has('error'))
                 @include('error_toast')
                @endif
              <h6>Products table</h6>

            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Produit</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Prix</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">date</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>

                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>

                  <tbody>
             @foreach($products as $item)
             <tr>
                <td>
                    <div class="d-flex px-2 py-1">
                      <div>
                        <img src="../assets/img/image1.jpg" class="avatar avatar-md me-3" alt="product">

                      </div>

                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm">{{$item->name}}</h6>
                        <p class="text-xs text-secondary mb-1">{{$item->category->name}}</p>
                       <span class="text-xs text-secondary mb-0">
                          <a  href="{{ url('/web/images_product/'.$item->id) }}" class="badge text-bg-dark">
                          images</a> |
                         <a href="{{ url('/web/attributes_product/'.$item->id) }}" class="badge text-bg-light">Variations</a>
                       </span>
                      </div>
                    </div>
                  </td>
                <td>
                  <p class="text-xs font-weight-bold mb-0">{{$item->price}}</p>
                  <p class="text-xs text-secondary mb-0">{{Str::upper($item->currency)}}</p>
                </td>
                <td class="align-middle text-center text-sm">
                  <span class="badge badge-sm bg-gradient-success">{{$item->status}}</span>
                </td>
                <td class="align-middle text-center">
                  <span class="text-secondary text-xs font-weight-bold">{{date('d-m-Y', strtotime($item->created_at))}}</span>
                </td>

                <td  class="align-middle text-center" style="width:200px;">
                    <a data-bs-toggle="modal" data-bs-target="#descriptionproductModal{{$item->id}}">
                    <div style="width:200px; overflow:hidden; text-overflow: ellipsis; " class="text-secondary text-xs font-weight-bold">

                    {{$item->description}}</div>
                </a>
                </td>

                <td class="align-middle">
             <button
             onclick="location.href='{{ url('/web/edit_product/'.$item->id) }}'"
             type="button" class="btn bg-gradient-info w-auto me-2">
                <i class="bi bi-pencil-square"></i>
              </button>
              <a data-bs-toggle="modal" data-bs-target="#deleteproductModal{{$item->id}}"
                title="Delete Product">
          <button type="button" class="btn bg-gradient-danger w-auto me-2"><i class="bi bi-trash"></i></button>
                </td>
            </a>
            @include('products.delete')
            @include('products.description')
              </tr>










             @endforeach
                  </tbody>



                </table>

                <div class="d-flex justify-content-center">
                    {!! $products->links() !!}
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
