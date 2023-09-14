

<!-- Modal -->
<div class="modal fade"  id="deleteproductimage{{explode('/',$item)[4]}}">
    <div class="modal-dialog">
     <div class="modal-content">
      <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Delete Product Image</h5>
       <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
       <span aria-hidden="true">&times;</span>
       </button>
      </div>
      <form action="{{ url('/web/delete_product_image') }}" method="post">
        @csrf
      <div class="modal-body">
       <p>Are you sure you want to delete this image?</p>
     </div>
          <input hidden name="id" value={{$id}}>
          <input hidden name="imagename" value={{explode('/',$item)[5]}}>
     <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
       <button type="submit" class="btn btn-danger">Yes</button>
      </div>
    </form>
     </div>
    </div>
   </div>
