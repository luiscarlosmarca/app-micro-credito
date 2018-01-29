
 
<form method="POST" v-on:submit.prevent="createCliente">
  <div class="modal fade" id="create" role="dialog" > 
    
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
               <span> &times;</span>
            </button>
            <h4> Nuevo Cliente </h4>
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
            
          <label for="persona">Estado</label>
          <input type="text" name="estado" value="test" class="form-control" v-model="estado">

          <label for="persona">Cobrador</label>
          
          
          {{ Form::select('cobrador_id', $cobradores, 0,['class'=>'form-control cobrador_id'],['v-model'=>'cobrador_id']) }}
        

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