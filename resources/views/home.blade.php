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
                            <th>Ingresos</th>
                            <th>Seguros</th>
                          
                            <th>Efectivo diario</th>
                          
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
                                $gastos=$total_gastos;
                                 $total_gastos=number_format($total_gastos, 0, '.', '.' );

                                echo "$$total_gastos";?>
                                                        

                             </td>

                            <td width="10px">

                                  <?php $total_prestamos=0; $seguros=0; $pagos_domingos=0 ?>
                                 @foreach ($cartera->prestamos as $prestamo)
                                  <?php $total_prestamos=$prestamo->valor+$total_prestamos; 
                                  $seguros=$prestamo->valor_seguro+$seguros;
                                  $pagos_domingos=$pagos_domingos+$prestamo->pago_domingos;
                                  ?>
                                                         
                                 @endforeach 
                                
                                 <?php
                                 
                                 $prestamos=$total_prestamos;
                                 $total_prestamos=number_format($total_prestamos, 0, '.', '.' );
                                 echo "$$total_prestamos";

                                  ?>
                

                             </td>
                            <td>
                                <?php $cobros=0;?>
                                 @foreach ($cartera->prestamos as $prestamo)
                                 
                                    @foreach ($prestamo->cobros as $cobro)
                                         <?php $cobros=$cobro->valor+$cobros; ?>
                                      @endforeach 
                                 @endforeach   

                                 <?php $cobros=$cobros+$pagos_domingos; 
                                  $cobros_=$cobros;
                                   $cobros_=number_format( $cobros_, 0, '.', '.' );
                                   echo "$";
                                   echo "$cobros_"; ?>

                            </td>

                            <td>
                                <?php 
                                $seguros_=$seguros;
                                $seguros_=number_format( $seguros_, 0, '.', '.' );
                                echo "$";
                                  
                                 echo "$seguros";?>

                            </td>
                         <td>
                                 
                                  
                                <?php 
                                    $utilidad=0;
                                    $utilidad=($cobros+$seguros)-($gastos+$prestamos);
                                    
                                    if ($utilidad<0) {
                                        
                                        $utilidad= $utilidad*-1;
                                        
                                        $utilidad=number_format( $utilidad, 0, '.', '.' );
                                         echo "<label class='control-label bg-red' for='inputSuccess'><i class='fa fa-check'></i>";
                                          echo "$";
                                         echo "$utilidad";
                                         echo "</label>";

                                    }elseif ($utilidad>=0) {
                                      

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
