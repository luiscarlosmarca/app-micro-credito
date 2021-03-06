<form method="POST" v-on:submit.prevent="UpdateCobrador(fillCobrador.id)">
  <div class="modal fade" id="edit" role="dialog" > 
    
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
               <span> &times;</span>
            </button>
            <h4> Actualizar datos del cobrador= @{{fillCobrador.nombre}} </h4>
       </div>
       <div class="modal-body">
          
          <label for="cartera">Nombre  </label>
          <input type="text" name="nombre" class="form-control" v-model="fillCobrador.nombre">

          <label for="persona">Cedula </label>
          <input type="text" name="cedula" class="form-control" v-model="fillCobrador.cedula">
          
        
           
          <label for="persona">Celular </label>
          <input type="text" name="celular" class="form-control" v-model="fillCobrador.celular">
          
          <label for="persona">Direccion </label>
          <input type="text" name="direccion" class="form-control" v-model="fillCobrador.direccion">
      
          <label for="persona">Carteras</label>
          
          
          {{ Form::select('carteras', $carteras, 0,['class'=>'form-control carteras m'],['v-model'=>'carteras']) }}

          
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