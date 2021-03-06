@extends('layouts.master')
@section('content')
<div id="cobros"  class="box-header with-border">
   
    <h1 class="box-title" > Cobros</h3>
      <input type="hidden" class="estatic" id="estatic" value="{{\Session::get('valor_estatico') ?: 0}}" name="">
    ->Efectivo diario @{{efectivo_diario}} 
    @include('cobros.search') 
    <div class="box-body" style="margin-left: 10px;margin-right: 10px;">
        <div class="row">
            
                                 
          
       
          <table class="table table-hover table-striped table-responsive">
            <thead>
              <tr>
                <th style="width: 20px;">Orden</th>
                <th>Cliente</th>
            
              
                <th>Valor Prestado</th>
                <th>Valor a pagar</th>
                <th style="width: 100px;">Saldo</th>
                <th style="width: 200px;">Cuota</th>
                <th>Accion</th>
         
              
              </tr>
            </thead>
            <tbody>
              <tr>
                 @foreach ($prestamos as $prestamo)
                    <td>{{$prestamo->orden}}</td>
                    <td width="10px">{{$prestamo->cliente->nombre }}</td>
                  
                 
                     <?php $total_pagos=0; ?>
                     @foreach ($prestamo->cobros as $cobro)
                      <?php $total_pagos=$cobro->valor+$total_pagos; ?>
                     
                     @endforeach 

                    
                      <?php $saldo= $prestamo->valor_pagar-$total_pagos -$prestamo->pago_domingos;
                        ?>
                          
                  
                     <td> <?php $valor=number_format( $prestamo->valor, 0, '.', '.' ); echo "$$valor";?></td>
                     <td > <?php $valor_a_pagar=number_format( $prestamo->valor_pagar, 0, '.', '.' ); echo "$valor_a_pagar";?></td>
                    <td id="saldo_th{{$prestamo->id}}" width="20px" class="success">  
                      <input id="saldo{{$prestamo->id}}" type="hidden" value="<?php echo"$saldo"; ?>" name=""> 
                       <?php if($saldo>0){
                          $saldo=number_format( $saldo, 0, '.', '.' );  
                          echo "$";
                          echo "$saldo";

                        }else{


                         $saldo=$saldo*-1;
                         $saldo=number_format( $saldo, 0, '.', '.' );
                         echo "<label class='control-label bg-green' for='inputSuccess'><i class='fa fa-check'></i>";
                          echo "$";
                         echo "$saldo";
                         echo "</label>";
                      
                        }

                       ?>

                    </td>
                    <td>
                       <div class="input-group">
                        <span class="input-group-addon">$</span>
                        <input class="form-control"  id="{{$prestamo->id}}" type="text" v-on:keyup.enter="PagarCuota({{$prestamo->id}})">
                        <span class="input-group-addon">.00</span>
                       </div>
                    </td>
                   
                    <td>  <a href="#" class="btn btn-warning btn-sm"n v-on:click.prevent="editPrestamo({{$prestamo}})">Ordenar</a></td>
                    <td><a href="movimientos/{{$prestamo->id}}"class="btn btn-success btn-sm ">Ver</a></td>

              </tr>
            @endforeach
            </tbody>
              <span v-for="error in errors" id="error" lass="text-danger">
            @{{error}}
          </span>
          </table>
        
  
        @include('cobros.prestamo.edit')  
            
          
        </div>
    

    </div>



</div>
     

@endsection
