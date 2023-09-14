

<!-- Modal -->
<div class="modal fade"  id="descriptionproductModal{{$item->id}}">
    <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header">
       {{-- <h5 class="modal-title" id="exampleModalLabel">Description</h5> --}}
       <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
       <span aria-hidden="true">&times;</span>
       </button>
      </div>
      <div class="modal-body">


        <div class="form-group">
          <label for="message-text" class="col-form-label">Description:</label>
          <textarea rows="12" cols="50" style="height: 50%"
          class="form-control" id="message-text">{{$item->description}}
        </textarea>
        </div>

        </div>
     </div>
    </div>
   </div>
