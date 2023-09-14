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
                <p class="mb-0">Add shipping</p>

              </div>
            </div>
            <div class="card-body">
              <p class="text-uppercase text-sm">shipping Fields</p>
              <form class="forms-sample" action="{{url('/web/add_shipping') }}" method="post">
                {{ csrf_field() }}
               <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label" >shipping Name</label>
                      <input class="form-control"  type="text" value="{{old('name')}}"  name="name">

                      @error('name')
                      @foreach ($errors->get('name')  as $message)

                            <p class="badge text-bg-danger">{{$message}}</p>
                      @endforeach

                  @enderror

                    </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label" >shipping price</label>
                    <input class="form-control"  type="number" value="{{old('price')}}"  name="price">

                    @error('price')
                    @foreach ($errors->get('price')  as $message)

                          <p class="badge text-bg-danger">{{$message}}</p>
                    @endforeach

                @enderror

                  </div>

                </div>
               </div>

                <div class="col-md-12">
                    <label for="example-text-input" class="form-control-label">shipping city</label>
                <select class="form-select" name="city_id" >

                @foreach ($cities as $city)
                <option value={{$city->id}} {{old('city_id')==$city->id?'selected':''}} >{{$city->name}}</option>

                @endforeach

            @error('city_id')
                  @foreach ($errors->get('city_id') as $error )
                      <p class="badge text-bg-danger">{{$error}}</p>
                  @endforeach

                  @enderror
                </select></div>
              <div class="card-header pb-0">
                <div class="d-flex align-items-center">
                  <button class="btn btn-primary btn-sm ms-auto" type="submit">Add</button>
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
