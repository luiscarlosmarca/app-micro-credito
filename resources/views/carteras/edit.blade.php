<form method="POST" v-on:submit.prevent="UpdateCartera(fillCartera.id)">
  <div class="modal fade" id="edit" role="dialog" > 
    
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
               <span> &times;</span>
            </button>
            <h4> Editar  Cartera </h4>
       </div>
       <div class="modal-body">
          
          <label for="cartera"> Editar  </label>
          <input type="text" name="nombre" class="form-control" v-model="fillCartera.nombre">
          <span v-for="error in errors" class="text-danger">
            @{{error}}
          </span>
       </div>

       <div class="modal-footer">
          
          <input type="submit" class="btn btn-success" value="Actualizar">

       </div>
      </div>
    </div>
  </div>
</form>