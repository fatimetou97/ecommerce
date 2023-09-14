@include('header')
<body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
 @include('sidebar')
  <div class="main-content position-relative max-height-vh-100 h-100">
    <!-- Navbar -->
  @include('navbar')
    <!-- End Navbar -->
    <main class="main-content position-relative border-radius-lg ">


    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-8">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Edit City</p>
                <button class="btn btn-primary btn-sm ms-auto">Image</button>
              </div>
            </div>
            <div class="card-body">
              <p class="text-uppercase text-sm">City Fields</p>
              <form class="forms-sample" action="{{url('/web/edit_city/'.$city->id) }}" method="post">
                                  @csrf
             <input class="form-control" type="hidden" value={{$city->id}} name="id">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label" >City Name</label>
                    <input class="form-control" required type="text" value={{$city->name}} name="name">
           @error('name')


                @foreach ($errors->get('name') as $error)
                   <p class="badge text-bg-danger">{{$error}}</p>
               @endforeach

               @enderror

                </div>
                </div>


              <div class="card-header pb-0">
                <div class="d-flex align-items-center">
                  <button class="btn btn-primary btn-sm ms-auto" type="submit">Edit</button>
                </div>
              </div>
              </form>
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
