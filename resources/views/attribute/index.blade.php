
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
            onclick="location.href='{{ url('/web/add_attribute') }}'"
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
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>

                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">attribute</th>

                      <th class="text-secondary opacity-7">Action</th>
                    </tr>
                  </thead>

                  <tbody>
             @foreach($attributes as $item)
             <tr>
                <td>
                    <div class="d-flex px-2 py-1">
                 {{$item->id}}

                    </div>
                  </td>
                <td>
                  <div class="d-flex px-2 py-1">

                    <div class="d-flex flex-column justify-content-center">
                      <h6 class="mb-0 text-sm">{{$item->name}}</h6>

                    </div>
                  </div>
                </td>

                <td class="align-middle">
                 <button type="button"
                  onclick="location.href='{{ url('/web/edit_attribute/'.$item->id) }}'"
                  class="btn bg-gradient-info w-auto me-2">
                     <i class="bi bi-pencil-square"></i>
                </button>
              <a data-bs-toggle="modal" data-bs-target="#deleteattributeModal{{$item->id}}"
                title="Delete attribute">
                <button  class="btn bg-gradient-danger w-auto me-2"><i class="bi bi-trash"></i></button>
              </a>

                <button   type="button"
                 onclick="location.href='{{ url('/web/attribute_options/'.$item->id) }}'" class="btn bg-gradient-success w-auto me-2">
                 <i class="bi bi-magic"></i>
                </button>

                </td>




                @include('attribute.delete')
              </tr>

             @endforeach
                  </tbody>



                </table>

                <div class="d-flex justify-content-center">
                    {!! $attributes->links() !!}
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
