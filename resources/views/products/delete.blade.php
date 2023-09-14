

<!-- Modal -->
<div class="modal fade"  id="deleteproductModal{{$item->id}}">
    <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
       <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
       <span aria-hidden="true">&times;</span>
       </button>
      </div>
      <form action="{{ url('/web/products', $item->id) }}" method="post">
        @csrf
        @method('DELETE')
      <div class="modal-body">
       <p>Are you sure you want to delete {{$item->name}} ?</p>
     </div>

     <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
       <button type="submit" class="btn btn-danger">Yes</button>
      </div>
    </form>
     </div>
    </div>
   </div>
