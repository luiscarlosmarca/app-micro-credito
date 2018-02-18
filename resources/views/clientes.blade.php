@extends('layouts.master')

@section('content')
<div id="cliente"  class="box-header with-border">
   
    <h1 class="box-title"> clientes</h3>
           
    <div class="box-body" style="margin-left: 10px;margin-right: 10px;">
        <div class="row">
            
          <a href="#" class="btn btn-success  pull-right" data-toggle="modal" data-target="#create">
              Nuevo cliente
          </a>
          <table class="table table-hover table-striped">
            <thead>
              <tr>
                <th>Cedula</th>
                <th>Nombre</th>
                
                <th>Celular</th>
              
                <th>Estado</th>
                <th>Id cobrador</th>
               
                <th colspan="2">
                  &nbsp;
                </th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="cliente in clientes">
                <td width="10px">@{{cliente.cedula}}</td>
                <td>@{{cliente.nombre}}</td>
             
                <td>@{{cliente.celular}}</td>
               
                <td>@{{cliente.estado}}</td>
                <td>@{{cliente.cobrador_id}}</td>
              
                <td width="10px">
                  <a href="#" class="btn btn-warning btn-sm"n v-on:click.prevent="editCliente(cliente)">Editar</a>
                </td>
                <td width="10px"> 
                  <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="deleteCliente(cliente)">Eliminar</a>
                </td>

              </tr>

            </tbody>
          </table>
       
       
       @include('clientes.create')
       @include('clientes.edit')
            
          
        </div>
    

    </div>



</div>
     

@endsection
