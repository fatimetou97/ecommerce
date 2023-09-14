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
                <p class="mb-0">Edit Category</p>
                <button class="btn btn-primary btn-sm ms-auto">Image</button>
              </div>
            </div>
            <div class="card-body">
              <p class="text-uppercase text-sm">Category Fields</p>
              <form class="forms-sample" action="{{url('/web/edit_category/'.$category->id) }}" method="post" enctype="multipart/form-data">
                                  @csrf
             <input class="form-control" type="hidden" value={{$category->id}} name="id">
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label" >Category Name</label>
                      <input class="form-control"  type="text" value={{$category->name}} name="name">
             @error('name')


                  @foreach ($errors->get('name') as $error)
                     <p class="badge text-bg-danger">{{$error}}</p>
                 @endforeach

                 @enderror

                  </div>
                  </div>  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label" >Arabic Name</label>
                      <input class="form-control"  type="text" value={{$category->ar_name}} name="ar_name">
             @error('ar_name')


                  @foreach ($errors->get('ar_name') as $error)
                     <p class="badge text-bg-danger">{{$error}}</p>
                 @endforeach

                 @enderror

                  </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label" >French Name</label>
                      <input class="form-control"  type="text" value={{$category->fr_name}} name="fr_name">
             @error('fr_name')


                  @foreach ($errors->get('fr_name') as $error)
                     <p class="badge text-bg-danger">{{$error}}</p>
                 @endforeach

                 @enderror

                  </div>
                  </div>  <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label" >English Name</label>
                      <input class="form-control"  type="text" value={{$category->en_name}} name="en_name">
             @error('en_name')


                  @foreach ($errors->get('en_name') as $error)
                     <p class="badge text-bg-danger">{{$error}}</p>
                 @endforeach

                 @enderror

                  </div>
                  </div>
              </div>
               <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label" >Category Image</label>
                      <input class="form-control"  type="file" value="{{old('image')}}"  name="image" >
                      <img src={{$category->image()}} class="avatar avatar-md me-3" alt="product">
                      @error('image')
                      @foreach ($errors->get('image')  as $message)

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
