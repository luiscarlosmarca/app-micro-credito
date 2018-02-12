@extends('layouts.master')

@section('content')
<div id="cobros"  class="box-header with-border">
   
    <h1 class="box-title"> Movimientos del cliente: {{$prestamo->cliente->nombre}}</h3>
   <br> <h2 class="box-title"> De la cartera: {{$prestamo->mi_cartera->nombre}}</h3>
  
    <div class="box-body" style="margin-left: 10px;margin-right: 10px;">
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
                    <td>{{$cobro->valor}}</td>
                    <td>{{$cobro->created_at}}</td>
                    <td>{{$cobro->observaciones}}</td>
                    <td>  <a href="#" class="btn btn-warning btn-sm" v-on:click.prevent="editCobro({{$cobro}})">Editar</a></td>      
                  <td>  <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="deleteCobro({{$cobro->id}})">Eliminar</a></td>      


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


