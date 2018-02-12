<form method="POST" v-on:submit.prevent="updateCobro(fillcobro.id)">
  <div class="modal fade" id="edit" role="dialog"> 
    
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
               <span> &times;</span>
            </button>
            <h4> Actualizar Movimiento </h4>
       </div>
       <div class="modal-body">
          
          <label for="cobro">Valor  </label>
          <input type="text" name="valor" class="form-control" v-model="fillcobro.valor">

          <label for="cobro">Observaciones </label>
          <textarea COLS=20 ROWS=10 name="observaciones" v-model="fillcobro.observaciones" class="form-control"></textarea> 
          
         

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