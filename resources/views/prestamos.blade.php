@extends('layouts.master')

@section('content')
<div  id="prestamos"  class="box-header with-border">
   
    <h1 class="box-title"> Prestamos</h3>
           
    <div class="box-body" style="margin-left: 10px;margin-right: 10px;">
        <div class="row">
            
                                 
          
          <a href="#" class="btn btn-success  pull-right" data-toggle="modal" data-target="#create">
              Nuevo prestamo
          </a>
          <table class="table table-hover table-striped">
            <thead>
              <tr>
                <th>Id</th>
                <th>Cartera</th>
                <th>Cobrador</th>
                <th>Cliente</th>
                <th>Valor</th>
                <th>Fecha</th>
              
                <th colspan="2">
                  &nbsp;
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($prestamos as $prestamo)
              <tr>

                <td width="10px">{{$prestamo->id}}</td>
                <td width="10px">{{$prestamo->mi_cartera->nombre}}</td>
                <td width="10px">{{$prestamo->cobrador->nombre}}</td>
                <td>{{$prestamo->cliente->nombre}}</td>
                <td>{{$prestamo->valor}}</td>
                <td>{{$prestamo->created_at}}</td>
               
              
                <td width="10px">
                  <a href="#" class="btn btn-warning btn-sm"n v-on:click.prevent="editPrestamo({{$prestamo}})">Editar</a>
                </td>
                <td width="10px"> 
                  <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="deletePrestamo({{$prestamo->id}})">Eliminar</a>
                </td>
              </tr>
              @endforeach 
            </tbody>
          </table>
        
      @include('prestamos.create')
      @include('prestamos.edit') 
            
          
        </div>
    

    </div>



</div>
     

@endsection
