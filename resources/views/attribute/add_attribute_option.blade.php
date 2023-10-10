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
              <p class="text-uppercase text-sm">Attribute Option Fields</p>
              <form class="forms-sample" action="{{url('/web/add_attribute_option/'.$id_attribute) }}" method="post">
                {{ csrf_field() }}
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label" >Attribute Option Name</label>
                    <input class="form-control"  placeholder="Exemple:white,red ,12,80...." type="text" value="{{old('name')}}"  name="name">

                    @error('name')
                    @foreach ($errors->get('name')  as $message)

                          <p class="badge text-bg-danger">{{$message}}</p>
                    @endforeach

                @enderror

                  </div>

                </div>


             <div class="row">

                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Attribute</label>
                      <select class="form-select"  name="attribute_id">
                          @foreach ($attributes as $attribute )
                          <option {{old('attribute_id',$id_attribute)==$attribute->id ? 'selected' :''}}
                            value="{{$attribute->id}}">{{$attribute->name}}</option>

                          @endforeach

                        </select>

                    </div>
                    @error('attribute_id')
                      @foreach ($errors->get('attribute_id') as $error )
                          <p class="badge text-bg-danger">{{$error}}</p>
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
