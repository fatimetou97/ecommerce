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
              <p class="text-uppercase text-sm">Product Variation Fields</p>
              <form class="forms-sample" action="{{url('/web/add_product_attribute/'.$product_id) }}" method="post">
                {{ csrf_field() }}

<input type="hidden" name="attribute" value={{session()->get('attribute_id')}}>
             <div class="row">

                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Attribute</label>


                      <select class="form-select"   name="attribute_id" onchange="window.location.href=this.value;" >
                        <option disabled selected value="">Select Attribute</option>
                          @foreach ($attributes as $attribute )

                            <option {{old('attribute_id',session()->has('attribute_id')?session()->get('attribute_id'):"")==$attribute->id ? 'selected' :''}}
                            value="{{ url('/web/get_attribute_values/'.$attribute->id) }}">{{$attribute->name}}


                         </option>


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
                  {{-- <label for="Roles">Roles</label>

                  <select style="width:100%" class="roles"  name="roles[]" multiple="multiple"
                   required >

                           <option value="1">
                               1
                           </option>
                           <option value="2">
                           2
                        </option>

                    </select> --}}
                  @if (session()->has('values'))
              <div class="col-md-12">
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">
                        Attribute Options</label>



                   <select style="width:100%" class="product_options"  name="options[]" multiple="multiple"
                   required >

                          @foreach (session()->get('values') as $attributev )

                            <option

                      {{ in_array($attributev->id,(array) session()->get('values_selected')) ? "selected" : "" }}
                            value="{{$attributev->id}}">{{$attributev->name}}


                         </option>


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
                  @endif

                  {{-- // if one of the attribute option exists already --}}
         @if (session()->has('exists'))

      <p class="badge text-bg-danger">{{session()->get('exists')}}</p>
           @endif

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
