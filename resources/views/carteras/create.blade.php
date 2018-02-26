<form method="POST" v-on:submit.prevent="createCartera">
  <div class="modal fade" id="create" role="dialog" > 
    
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
               <span> &times;</span>
            </button>
            <h4> Nueva Cartera </h4>
       </div>
       <div class="modal-body">
          
          <label for="cartera">Crear Cartera </label>
          <input type="text" name="nombre" class="form-control" v-model="newCartera">
          <span v-for="error in errors" class="text-danger">
            @{{error}}
          </span>
       </div>

       <div class="modal-footer">
          
          <input type="submit" class="btn btn-success" value="Guardar Cartera">

       </div>
      </div>
    </div>
  </div>
</form>