
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

            <button
            onclick="location.href='{{ url('/web/add_category') }}'"
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
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>

                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>

                  <tbody>
             @foreach($categories as $item)
             <tr>
                <td>{{$item->id}}</td>
                <td>
                  <div class="d-flex px-2 py-1">
                    <div>
                      <img src="../assets/img/image1.jpg" class="avatar avatar-md me-3" alt="product">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">{{$item->name}}</h6>

                    </div>
                  </div>
                </td>

                <td class="align-middle">
                 <button type="button"
                  onclick="location.href='{{ url('/web/edit_category/'.$item->id) }}'"
                  class="btn bg-gradient-info w-auto me-2">
                     <i class="bi bi-pencil-square"></i>
                </button>
              <a data-bs-toggle="modal" data-bs-target="#deletecategoryModal{{$item->id}}"
                title="Delete Category">
                <button  class="btn bg-gradient-danger w-auto me-2"><i class="bi bi-trash"></i></button>
              </a>

                <button   type="button"
                 onclick="location.href='{{ url('/web/products_category/'.$item->id) }}'" class="btn bg-gradient-success w-auto me-2">
                    <i class="bi bi-columns-gap"></i>
                </button>

                </td>




                @include('category.delete')
              </tr>

             @endforeach
                  </tbody>



                </table>

                <div class="d-flex justify-content-center">
                    {!! $categories->links() !!}
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
