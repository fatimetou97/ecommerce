


<!-- Modal -->
<div class="modal fade" id="attributesModal{{$item->product->id}}">
    <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Item Attributes</h5>
       <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
       <span aria-hidden="true">&times;</span>
       </button>
      </div>
      <div class="table-responsive p-0">

      <table class="table align-items-center mb-0">
        <thead>
          <tr>

        </tr>
        </thead>

        <tbody>
            @foreach ($order_options as $key => $value)


            <div class="d-flex px-2 py-1">
                <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-sm">
                    {{ $key }}</h6>
   <tr>
    @foreach($value as $item)
      <td>

    <p class="text-xs text-secondary mb-1">
        {{$item->attribute_option_name}}</p>
              </div>
          </div>
        </td>

        @endforeach

    </tr>
    @endforeach

        </tbody>



      </table>
     </div>
     <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>

      </div>

     </div>
    </div>
   </div>
