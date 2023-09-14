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
                <p class="mb-0">Add Discount</p>

              </div>
            </div>
            <div class="card-body">
              <p class="text-uppercase text-sm">discount Fields</p>
              <form class="forms-sample" action="{{url('/web/edit_discount/'.$discount->id) }}" method="post">
                {{ csrf_field() }}
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label" >Discount</label>
                      <input class="form-control"  type="number" value="{{old('discount',$discount->discount)}}"  name="discount">

                      @error('discount')
                      @foreach ($errors->get('discount')  as $message)

                            <p class="badge text-bg-danger">{{$message}}</p>
                      @endforeach

                  @enderror

                    </div>

                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label" >Code</label>

                      <input name="code" class="form-control" type="text" value={{old('code',$discount->code)}}>

                      @error('code')
                      @foreach ($errors->get('code')  as $message)

                            <p class="badge text-bg-danger">{{$message}}</p>
                      @endforeach

                  @enderror

                    </div>

                  </div>

              </div>
             <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label" >Type</label>

                      <select class="form-select" name="type">

                        <option {{old('type',$discount->type)=="fixed"?'selected':''}}  value="fixed" >Fixed </option>
                        <option {{old('type',$discount->type)=="percentage"?'selected':''}} value="percentage" >Percentage </option>
                      </select>

                      @error('type')
                      @foreach ($errors->get('type')  as $message)

                            <p class="badge text-bg-danger">{{$message}}</p>
                      @endforeach

                  @enderror

                    </div>

                  </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label" >Expired Date</label>
                      <input class="form-control" type="date" value="{{old('expired_date',$discount->expired_date)}}"  name="expired_date">

                      @error('expired_date')
                      @foreach ($errors->get('expired_date')  as $message)

                            <p class="badge text-bg-danger">{{$message}}</p>
                      @endforeach

                  @enderror

                    </div>
              </div></div>
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
