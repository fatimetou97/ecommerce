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
                <p class="mb-0">Edit Customer</p>

              </div>
            </div>
            <div class="card-body">
              <p class="text-uppercase text-sm">Customer Fields</p>
              <form class="forms-sample" action="{{url('/web/edit_customer/'.$customer->id) }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label" >Customer First Name</label>
                          <input class="form-control"  type="text" value="{{old('first_name',$customer->first_name)}}"  name="first_name">

                          @error('first_name')
                          @foreach ($errors->get('first_name')  as $message)

                                <p class="badge text-bg-danger">{{$message}}</p>
                          @endforeach

                      @enderror

                        </div>

                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label" >Customer Last Name</label>
                          <input class="form-control"  type="text" value="{{old('last_name',$customer->last_name)}}"  name="last_name">

                          @error('last_name')
                          @foreach ($errors->get('last_name')  as $message)

                                <p class="badge text-bg-danger">{{$message}}</p>
                          @endforeach

                      @enderror

                        </div>

                      </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label" >Phone</label>
                          <input class="form-control"  type="tel" value="{{old('phone',$customer->phone)}}"  name="phone">

                          @error('phone')
                          @foreach ($errors->get('phone')  as $message)

                                <p class="badge text-bg-danger">{{$message}}</p>
                          @endforeach

                      @enderror

                        </div>

                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label" >Email</label>
                          <input class="form-control"  type="email" value="{{old('email',$customer->email)}}"  name="email">

                          @error('email')
                          @foreach ($errors->get('email')  as $message)

                                <p class="badge text-bg-danger">{{$message}}</p>
                          @endforeach

                      @enderror

                        </div>

                      </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label" >Password</label>
                          <input class="form-control"  type="password"   name="password">

                          @error('password')
                          @foreach ($errors->get('password')  as $message)

                                <p class="badge text-bg-danger">{{$message}}</p>
                          @endforeach

                      @enderror

                        </div>

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
