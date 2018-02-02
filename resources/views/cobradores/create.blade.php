
 
<form method="POST" v-on:submit.prevent="createCobrador">
  <div class="modal fade" id="create" role="dialog" > 
    
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
               <span> &times;</span>
            </button>
            <h4> Nuevo cobrador </h4>
       </div>
       <div class="modal-body">
          
          <label for="persona">Nombre </label>
          <input type="text" name="nombre" class="form-control" v-model="nombre">

           <label for="persona">Cedula </label>
          <input type="text" name="cedula" class="form-control" v-model="cedula">
          
           <label for="persona">Email </label>
          <input type="text" name="email" class="form-control" v-model="email">
           
           <label for="persona">Celular </label>
          <input type="text" name="celular" class="form-control" v-model="celular">
          
           <label for="persona">Direccion </label>
          <input type="text" name="direccion" class="form-control" v-model="direccion">
         
          <input type="hidden" name="role" value="{!!$role !!}"  v-model="role">
          
          @if($role!="cobrador")
            <label for="persona">Estado</label>
            <input type="text" name="estado" value="test" class="form-control" v-model="Estado">

            <label for="persona">Cobrador</label>
            <input type="text" name="estado" class="form-control" v-model="Cobrador_id">

          @endif 
         

          <span v-for="error in errors" id="error" lass="text-danger">
            @{{error}}
          </span>
       </div>

       <div class="modal-footer">
          
          <input type="submit" class="btn btn-success" value="Guardar Cobrador">

       </div>
      </div>
    </div>
  </div>
</form>