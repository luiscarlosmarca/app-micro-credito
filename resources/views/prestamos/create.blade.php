
 
<form method="POST" v-on:submit.prevent="createPrestamo">
  <div class="modal fade" id="create" role="dialog" > 
    
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
               <span> &times;</span>
            </button>
            <h4> Nuevo Prestamo </h4>
       </div>
       <div class="modal-body">
         <div class="row"> 
          <div class="col-md-6">
              <label for="persona">Cartera </label>
              {{ Form::select('cartera_id', $carteras, 0,['class'=>'form-control cartera_id'],['v-model'=>'cartera_id']) }}

              <label for="persona">Cliente</label>
              {{ Form::select('cliente_id', $clientes, 0,['class'=>'form-control cliente_id'],['v-model'=>'cliente_id']) }}

           

              <label for="persona">Articulo </label>
              <input type="text" name="articulo" class="form-control" v-model="articulo">

             <label for="persona">Estado</label>
             {{ Form::select('estado', ['Pago'=>'Pago','Debe'=>'debe','En mora'=>'en mora','Buscando para matar'=>'buscando las liendras'], 0,['class'=>'form-control estado'],['v-model'=>'estado']) }}

          </div>


          <div class="col-md-6">

              <label for="persona">Valor </label>
              <input type="text" name="valor" class="form-control" v-model="valor">

              <label for="persona">Plazo </label>
              <input type="text" name="plazo" class="form-control" v-on:focus="calcularInteres" v-model="plazo">
           
              <label for="persona">Pagos domingo </label>
              <input type="text" name="pago_domingos" class="form-control" v-on:focus="calcularCuota" v-model="pago_domingos">
                
              <label for="persona">Valor seguro</label>
              <input type="text" name="valor_seguro" value="" class="form-control" v-model="valor_seguro">
            
           
              <label for="persona">Valor cuota</label>
              <input type="text" name="valor_cuota" value="" class="form-control" v-model="valor_cuota">


           </div>
         </div>  

        
          
           
            
                
                                  

          <span v-for="error in errors" id="error" class="error" lass="text-danger">
            @{{error}}
          </span>
       </div>

       <div class="modal-footer">
          
          <input type="submit" class="btn btn-success" value="Crear prestamo">

       </div>
      </div>
    </div>
  </div>
</form>