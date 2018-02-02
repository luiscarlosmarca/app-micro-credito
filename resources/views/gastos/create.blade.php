<form method="POST" v-on:submit.prevent="createGasto">
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
          
            <label for="cartera">Valor</label>
            <input type="text" name="nombre" class="form-control" v-model="valor">


            <label for="persona">Detalles</label>
             <textarea COLS=20 ROWS=10 name="detalle" class="form-control" v-model="detalle"></textarea> 
              @{{error}}
            </span>
        </div>

       <div class="modal-footer">
          
          <input type="submit" class="btn btn-success" value="Guardar Gasto">

       </div>
      </div>
    </div>
  </div>
</form>