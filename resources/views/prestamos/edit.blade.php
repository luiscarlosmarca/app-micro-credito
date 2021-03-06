<form method="POST" v-on:submit.prevent="updatePrestamo(fillprestamo.id)">
  <div class="modal fade" id="edit" role="dialog" > 
    
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
               <span> &times;</span>
            </button>
            <h4> Actualizar prestamo </h4>
       </div>
       <div class="modal-body">
          
           <div class="row"> 
          <div class="col-md-6">
              <label for="persona">Cartera </label>
              {{ Form::select('fillprestamo.cartera_id', $carteras, 0,['class'=>'form-control fillprestamo.cartera_id','id'=>'cartera_id'],['v-model'=>'fillprestamo.cartera_id']) }}

              <label for="persona">Cliente</label>
              {{ Form::select('fillprestamo.cliente_id', $clientes, 0,['class'=>'form-control fillprestamo.cliente_id','id'=>'cliente_id'],['v-model'=>'fillprestamo.cliente_id']) }}

              

              <label for="persona">Articulo </label>
              <input type="text" name="fillprestamo.articulo" class="form-control" v-model="fillprestamo.articulo">

             <label for="persona">Estado</label>
             {{ Form::select('fillprestamo.estado', ['Pago'=>'Pago','Debe'=>'debe','En mora'=>'en mora','Buscando para matar'=>'buscando las liendras'], 0,['class'=>'form-control fillprestamo.estado'],['v-model'=>'fillprestamo.estado']) }}

          </div>


          <div class="col-md-6">

              <label for="persona">Valor </label>
              <input type="text" name="valor" class="form-control"  v-model="fillprestamo.valor">

              <label for="persona">Plazo </label>
              <input type="text" name="plazo" class="form-control"  v-on:focus="calcularInteres(false)"  v-model="fillprestamo.plazo">
           
              <label for="persona">Pagos domingo </label>
              <input type="text" name="pago_domingos" class="form-control" v-on:focus="calcularCuota(false)" v-model="fillprestamo.pago_domingos">
                
              <label for="persona">Valor seguro</label>
              <input type="text" name="valor_seguro" value="" class="form-control" v-model="fillprestamo.valor_seguro">
            
           
              <label for="persona">Valor cuota</label>
              <input type="text" name="valor_cuota" value="" class="form-control" v-model="fillprestamo.valor_cuota">


           </div>
         </div>  


          
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