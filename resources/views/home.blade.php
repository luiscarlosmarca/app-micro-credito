@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Administración</div>

                <div class="panel-body">
                    <table class="table table-hover table-striped">
                        
                        <thead>
                          <tr>
                            <th><input type="date" name="fecha" value="" id="fecha_admin" onchange="buscar(this)" placeholder="Fecha"></th>
                             <th>Creditos JC</th>
                            <th></th>
                           
                             <th>Vanesa</th>
                           
                          
                          
                          
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
                           print_r($hoy);
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

