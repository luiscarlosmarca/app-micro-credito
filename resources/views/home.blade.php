@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <table class="table table-hover table-striped">
                        
                        <thead>
                          <tr>
                            <th style="width: 200px">Cartera</th>
                            <th>Gastos</th>
                            <th>Prestamos</th>
                          
                            <th>Utilidad</th>
                          
                            <th colspan="2">
                              &nbsp;
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($carteras as $cartera)
                          <tr>
                            <td width="10px">{{$cartera->nombre}}</td>
                            <td width="10px">

                                  <?php $total_gastos=0; ?>
                                 @foreach ($cartera->gastos as $gasto)
                                  <?php $total_gastos=$gasto->valor+$total_gastos; ?>
                                 
                                 @endforeach 

                                
                                <?php 
                                 $total_gastos=number_format($total_gastos, 0, '.', '.' );
                                echo "$$total_gastos";?>
                            
                                             

                             </td>

                            <td width="10px">

                                  <?php $total_prestamos=0; $aux_utilidades=0; ?>
                                 @foreach ($cartera->prestamos as $prestamo)
                                  <?php $total_prestamos=$prestamo->valor+$total_prestamos; 
                                  $aux_utilidades=$prestamo->valor_seguro+ $prestamo->pago_domingos+$aux_utilidades;
                                  ?>
                                                         
                                 @endforeach 
                                
                                 <?php
                                 $interes=($total_prestamos*17)/100;
                                 $total_prestamos=$total_prestamos-$interes;
                                 $total_prestamos=number_format($total_prestamos, 0, '.', '.' );
                                 echo "$$total_prestamos";

                                  ?>
                

                             </td>
                            
                            <td>
                                 <?php $utilidad=0;?>
                                 @foreach ($cartera->prestamos as $prestamo)
                                 
                                    @foreach ($prestamo->cobros as $cobro)
                                         <?php $utilidad=$cobro->valor+$utilidad; ?>
                                      @endforeach 
                                 @endforeach   
                                  
                                <?php 
                                    $interes=($utilidad*20)/100;
                                    $utilidad = $utilidad-$interes;
                                    $utilidad= ($utilidad + $aux_utilidades)-$total_gastos-$total_prestamos;
                                    if ($utilidad<0) {
                                        
                                       // $utilidad= $utilidad*-1;
                                        
                                         //$utilidad=number_format( $utilidad, 0, '.', '.' );
                                         echo "<label class='control-label bg-red' for='inputSuccess'><i class='fa fa-check'></i>";
                                          echo "$";
                                         echo "$utilidad";
                                         echo "</label>";

                                    }elseif ($utilidad>0) {
                                      

                                         $utilidad=number_format( $utilidad, 0, '.', '.' );
                                         echo "<label class='control-label bg-green' for='inputSuccess'><i class='fa fa-check'></i>";
                                          echo "$";
                                         echo "$utilidad";
                                         echo "</label>";
                                    
                                    }
                                                  


                                ?>
                            
                            </td>
                            
                           
                          
                            
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
        
                </div>
            </div>
        </div>
    </div>

@endsection
