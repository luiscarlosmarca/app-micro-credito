@extends('layouts.master')

@section('content')
<div id="cobros"  class="box-header with-border">
   
    
   
  
    <div class="box-body" style="margin-left: 10px;margin-right: 10px;">
        <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-aqua"><i class="fa fa-user-o"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Cliente</span>
                <span class="info-box-number">{{$prestamo->cliente->nombre}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Cartera</span>
                <span class="info-box-number">{{$prestamo->mi_cartera->nombre}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Seguro</span>
                <span class="info-box-number">{{$prestamo->valor_seguro}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
              <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">domingos</span>
                <span class="info-box-number">{{$prestamo->pago_domingos}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>

        <div class="row">
            
                                 
          
       
          <table class="table table-hover table-striped table-responsive">
            <thead>
              <tr>
                <th>Valor</th>
                <th style="width: 200px;">Fecha</th>
                <th>Observaciones</th>
                
                <th>Accion</th>
         
              
              </tr>
            </thead>
            <tbody>
              <tr>
                 @foreach ($cobros as $cobro)
                    <td>
                      <?php $cobros_=$cobro->valor;
                      $cobros_=number_format( $cobros_, 0, '.', '.' );
                                   echo "$";
                                   echo "$cobros_"; ?>

                    </td>
                    <td>{{$cobro->created_at}}</td>
                    <td>{{$cobro->observaciones}}</td>
                    <td>  <a href="#" class="btn btn-warning btn-sm" v-on:click.prevent="editCobro({{$cobro}})">Editar</a></td>      
                  <td>  <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="deleteCobro({{$cobro}})">Eliminar</a></td>      


              </tr>
            @endforeach
            </tbody>
              <span v-for="error in errors" id="error" lass="text-danger">
               @{{error}}
              </span>
          </table>
        
    
          @include('cobros.edit') 
            
          
        </div>
    

    </div>



</div>
     

@endsection


