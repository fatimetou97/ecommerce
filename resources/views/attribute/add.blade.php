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
            <div class="card-body">
              <p class="text-uppercase text-sm">Attribute Fields</p>
              <form class="forms-sample" action="{{url('/web/add_attribute') }}" method="post">
                {{ csrf_field() }}
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label" >Attribute Name</label>
                    <input class="form-control"  placeholder="Exemple:color,size.." type="text" value="{{old('name')}}"  name="name">

                    @error('name')
                    @foreach ($errors->get('name')  as $message)

                          <p class="badge text-bg-danger">{{$message}}</p>
                    @endforeach

                @enderror

                  </div>

                </div>


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
