<form method="POST" v-on:submit.prevent="createGasto">
  <div class="modal fade" id="create" role="dialog" > 
    
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
               <span> &times;</span>
            </button>
            <h4> Nuevo Gasto </h4>
       </div>
        <div class="modal-body">
          <div class="col-md-6"> <label for="cartera">Valor</label>
            <input type="text" name="nombre" class="form-control" v-model="valor">
          </div>

          <div class="col-md-6"> <label for="cartera">Cartera</label>
            {{ Form::select('cartera_id', $carteras, 0,['class'=>'form-control cartera_id'],['v-model'=>'cartera_id']) }}
          </div>
          <div class="col-md-12">
          <label for="persona">Detalles</label>
             <textarea COLS=20 ROWS=10 name="detalle" class="form-control" v-model="detalle"></textarea> 
              @{{error}}
            </span>
          </div>
        </div>
 
       <div class="modal-footer">
          
          <input type="submit" class="btn btn-success" value="Guardar Gasto">

       </div>
      </div>
    </div>
  </div>
</form>