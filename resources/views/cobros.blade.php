@extends('layouts.master')

@section('content')
<div id="cobros"  class="box-header with-border">
   
    <h1 class="box-title"> Cobros</h3>
           
    <div class="box-body" style="margin-left: 10px;margin-right: 10px;">
        <div class="row">
            
                                 
          
       
          <table class="table table-hover table-striped">
            <thead>
              <tr>
                <th>Prestamo</th>
                <th>Cliente</th>
                <th>Cobrador</th>
                <th>Saldo</th>
                <th>Cuota</th>
                <th>Accion</th>
         
              
                <th colspan="2">
                  &nbsp;
                </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                 @foreach ($prestamos as $prestamo)
                    <td width="10px">{{$prestamo->id}}</td>
                    <td width="10px">{{$prestamo->cliente->nombre }}</td>
                    <td width="10px">{{$prestamo->cobrador->nombre }}</td>
                    <td width="10px">
                     <?php $total_pagos=0; ?>
                     @foreach ($prestamo->cobros as $cobro)
                      <?php $total_pagos=$cobro->valor+$total_pagos; ?>
                     
                     @endforeach 

                    
                      <?php $saldo= $prestamo->valor -$total_pagos ;

                        if($saldo>0){
                          echo "$saldo";

                        }else{
                          

                         $saldo=$saldo*-1;
                         echo "ganacias";
                         echo "$saldo";
                        }


                       ?>






                    </td>
                    
                    <td>
                       <div class="input-group">
                        <span class="input-group-addon">$</span>
                        <input class="form-control"  id="{{$prestamo->id}}" type="text">
                        <span class="input-group-addon">.00</span>
                       </div>
                    </td>
                   
       
    
       

                <td width="10px">
                    <div class="radio">
                      <label>
                        <input name="optionsRadios" id="optionsRadios1" v-on:click="PagarCuota({{$prestamo->id}},40000)" value="option1" type="radio">
                       Pago
                      </label>
                    </div>
                </td>
                <td width="10px"> 
                        
                     <div class="radio">
                      <label>
                        <input name="optionsRadios" id="optionsRadios2"  v-on:click="DebeCuota" value="option2" type="radio">
                        debe
                      </label>
                    </div>
            
                </td>
                <td>  <a href="#" class="btn btn-warning btn-sm"n v-on:click.prevent="editPrestamo(prestamo)">Editar</a></td>
              </tr>
            @endforeach
            </tbody>
              <span v-for="error in errors" id="error" lass="text-danger">
            @{{error}}
          </span>
          </table>
        
   {{--    @include('prestamos.create')
      @include('prestamos.edit')  --}}
            
          
        </div>
    

    </div>



</div>
     

@endsection
