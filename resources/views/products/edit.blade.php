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
        <div class="col-md-12">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Edit Product</p>

              </div>
            </div>
            <div class="card-body">
              {{-- <p class="text-uppercase text-sm">Add Product Fields</p> --}}
              <form  action="{{url('/web/update_product/'.$product->id)}}" method="post">
                {{ csrf_field() }}
              <div class="row">

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Global Name</label>
                    <input class="form-control" type="text" value='{{old('name',$product->name)}}' name="name">
                    @error('name')
                    @foreach ($errors->get('name') as $error )
                        <p class="badge text-bg-danger">{{$error}}</p>
                    @endforeach

                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Price</label>
                    <input class="form-control" type="number" value='{{ old('price',$product->price)}}' name="price">
                    @error('price')
                    @foreach ($errors->get('price') as $error )
                        <p class="badge text-bg-danger">{{$error}}</p>
                    @endforeach

                    @enderror
                  </div>
                </div>

              </div>

                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Currency</label>
                        <input class="form-control" type="text" value="{{old('currency',$product->currency)}}" name="currency">
                        @error('currency')
                        @foreach ($errors->get('currency') as $error )
                            <p class="badge text-bg-danger">{{$error}}</p>
                        @endforeach

                        @enderror
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="example-text-input" class="form-control-label">Status</label>
                          <select class="form-select"  name="status">

                              <option {{old('status',$product->status)=='published' ? 'selected' :''}}
                                value="published">Published</option>
                                <option {{old('status',$product->status)== 'unpublished'? 'selected' :''}}
                                value="unpublished">UnPublished</option>
                            </select>

                        </div>
                        @error('status')
                          @foreach ($errors->get('status') as $error )
                              <p class="badge text-bg-danger">{{$error}}</p>
                          @endforeach

                          @enderror
                      </div>
               </div>

               <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Arabic Name</label>
                    <input class="form-control" type="text" value="{{old('ar_name',$product->ar_name)}}" name="ar_name">
                    @error('ar_name')
                    @foreach ($errors->get('ar_name') as $error )
                        <p class="badge text-bg-danger">{{$error}}</p>
                    @endforeach

                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">French Name</label>
                    <input class="form-control" type="text" name="fr_name" value="{{old('fr_name',$product->fr_name)}}">
                    @error('fr_name')
                    @foreach ($errors->get('fr_name') as $error )
                        <p class="badge text-bg-danger mr-2">{{$error}}</p>
                    @endforeach

                    @enderror
                  </div>
                </div>



           <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">English Name</label>
                      <input class="form-control" type="text" value="{{old('en_name',$product->en_name)}}" name="en_name">
                      @error('en_name')
                      @foreach ($errors->get('en_name') as $error )
                          <p class="badge text-bg-danger mr-2">{{$error}}</p>
                      @endforeach
                     @enderror
                    </div>
                 </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="example-text-input" class="form-control-label">Category</label>
                  <select class="form-select"  name="category_id">
                      @foreach ($categories as $category )
                      <option {{old('category_id',$product->category_id)==$category->id ? 'selected' :''}}
                        value="{{$category->id}}">{{$category->name}}</option>

                      @endforeach

                    </select>

                </div>
                @error('category_id')
                  @foreach ($errors->get('category_id') as $error )
                      <p class="badge text-bg-danger">{{$error}}</p>
                  @endforeach

                  @enderror
              </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="example-text-input" class="form-control-label">Description</label>

                    <textarea class="form-control" value="{{old('description',$product->description)}}"  name="description" rows="3;">{{old('description',$product->description)}}
                    </textarea>


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
