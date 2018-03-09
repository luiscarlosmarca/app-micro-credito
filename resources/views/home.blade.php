@extends('layouts.master')

@section('content')

    <div class="row" id="prestamos">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Administración</div>

                <div class="panel-body">
                    <table class="table table-hover table-striped">
                        
                        <thead>
                          <tr>
                            <th><input type="date" name="fecha" value="" id="fecha_admin" v-on:change.prevent="buscar_admin()" placeholder="Fecha"></th>
                             <th>Vanesa</th>
                            <th></th>
                                                     
                            <th>Creditos JC</th>
                                
                            <th colspan="2">
                              &nbsp;
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                        
                          <?php 
                           $y=date("Y");
                           $m=date("m");
                           $d=date("d");
                           $hoy=$y."-".$m."-".$d;
                           
                          foreach ($carteras as  $key =>$value) {
                                    echo "<tr><td>$key</td>";                      
                              foreach ($value as  $key_ => $value_) {
                                
                                  echo "<td>$value_<td/>";

                              }
                               echo "</tr>";
                          }


                          ?>
                        </tbody>
                    </table>
        
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

<script type="text/javascript">
    
    function buscar(obj) {
        alert("test")
    }

</script>
@endsection

