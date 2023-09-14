
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
            <form method="POST" action="{{ url('/web/product_images/'.$id)}}" enctype="multipart/form-data">
                {{ csrf_field() }}

            <div class="row">
                <div class="col-4">
           <input class="form-control" type="file" name="images[]" multiple required>
                </div> <div class="col-4">
            <button

            type="submit" class=" ml-0 btn bg-gradient-secondary w-auto ">
              Upload
            </button></div>
        </form>
        </div>
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
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>

                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>

                  <tbody>
             @foreach($images as $item)

             <tr >
                {{$item}}
                <td class="w-25">

                    <img src={{$item}} class="img-fluid img-thumbnail " alt="product image">

                </td>
                {{-- <td >

                      <img src={{$item}} class="avatar avatar-xl " alt="product image">
                      <img src={{$item}} class="avatar avatar-sm" alt="product image">


                </td> --}}

                <td class="align-middle">

              <a data-bs-toggle="modal" data-bs-target="#deleteproductimage{{explode('/',$item)[4]}}"
                title="Delete Category">
                <button  class="btn bg-gradient-danger w-auto me-2"><i class="bi bi-trash"></i></button>
              </a>



                </td>




                @include('products.delete_image')
              </tr>

             @endforeach
                  </tbody>



                </table>

                <div class="d-flex justify-content-center">
                    {{-- {!! $categories->links() !!} --}}
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
