@extends('layouts.master')

@section('content')
<div  id="cobrador"  class="box-header with-border">
   
    <h1 class="box-title"> Cobradores</h3>
           
    <div class="box-body" style="margin-left: 10px;margin-right: 10px;">
        <div class="row">
            
                                 
          
          <a href="#" class="btn btn-success  pull-right" data-toggle="modal" data-target="#create">
              Nuevo Cobrador
          </a>
          <table class="table table-hover table-striped">
            <thead>
              <tr>
                <th>Id</th>
                <th>Cedula</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Celular</th>
              
                <th colspan="2">
                  &nbsp;
                </th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="cobrador in cobradores">
                <td width="10px">@{{cobrador.id}}</td>
                <td width="10px">@{{cobrador.cedula}}</td>
                <td>@{{cobrador.nombre}}</td>
                <td>@{{cobrador.email}}</td>
                <td>@{{cobrador.celular}}</td>
              
                <td width="10px">
                  <a href="#" class="btn btn-warning btn-sm"n v-on:click.prevent="editCobrador(cobrador)">Editar</a>
                </td>
                <td width="10px"> 
                  <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="deleteCobrador(cobrador.id)">Eliminar</a>
                </td>
              </tr>
              
            </tbody>
          </table>
        
       @include('cobradores.create')
       @include('cobradores.edit')
            
          
        </div>
    

    </div>



</div>
     

@endsection
