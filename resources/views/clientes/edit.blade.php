<form method="POST" v-on:submit.prevent="updateCliente(fillcliente.id)">
  <div class="modal fade" id="edit" role="dialog" > 
    
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
               <span> &times;</span>
            </button>
            <h4> Actualizar datos del cliente= @{{fillcliente.nombre}} </h4>
       </div>
       <div class="modal-body">
          
          <label for="cartera">Nombre  </label>
          <input type="text" name="nombre" class="form-control" v-model="fillcliente.nombre">

          <label for="persona">Cedula </label>
          <input type="text" name="cedula" class="form-control" v-model="fillcliente.cedula">
          
         
           
          <label for="persona">Celular </label>
          <input type="text" name="celular" class="form-control" v-model="fillcliente.celular">
          
          <label for="persona">Direccion </label>
          <input type="text" name="direccion" class="form-control" v-model="fillcliente.direccion">
         
          <input type="hidden" name="role" value="{!!$role !!}"  v-model="fillcliente.role">
        
          <label for="persona">Estado</label>
          <input type="text" name="estado" value="test" class="form-control" v-model="fillcliente.estado">

          <label for="persona">Cobrador</label>
          {{ Form::select('cobrador_id', $cobradores, 0,['class'=>'form-control cobrador_id','id'=>'cobrador_id']) }}


        <div id="error">
            <span v-for="error in errors"  class="text-danger">
            @{{error}}
          </span>
        </div>
        
       </div>

       <div class="modal-footer">
          
          <input type="submit" class="btn btn-success" value="Actualizar">

       </div>
      </div>
    </div>
  </div>
</form>