<form method="POST" v-on:submit.prevent="ordenar(id_prestamo)">
  <div class="modal fade" id="edit" role="dialog" > 
    
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">
               <span> &times;</span>
            </button>
            <h4> Ordenar cobros </h4>
       </div>
       <div class="modal-body">
          
           <div class="row"> 
    


          <div class="col-md-6">

             
              <label for="persona">orden </label>
              <input type="text" name="orden" class="form-control" v-model="orden.orden">
              <input type="hidden" v-model="id_prestamo">
             
           </div>
         </div>  


          
        <div id="error">
            <span v-for="error in errors"  class="text-danger">
            @{{error}}
          </span>
        </div>
        
       </div>

       <div class="modal-footer">
          
          <input type="submit" class="btn btn-success" value="Ordenar">

       </div>
      </div>
    </div>
  </div>
</form>