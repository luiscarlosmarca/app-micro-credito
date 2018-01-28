@extends('layouts.master')

@section('content')
<div  id="cartera"  class="box-header with-border">
   
    <h1 class="box-title"> Carteras</h3>
           
    <div class="box-body" style="margin-left: 10px;margin-right: 10px;">
        <div class="row">
            
                                 
           
          <a href="#" class="btn btn-success  pull-right" data-toggle="modal" data-target="#create">
              Nueva Cartera
          </a>
          <table class="table table-hover table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th colspan="2">
                  &nbsp;
                </th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="cartera in carteras">
                <td width="10px">@{{cartera.id}}</td>
                <td>@{{cartera.nombre}}</td>
                <td width="10px">
                  <a href="#" class="btn btn-warning btn-sm"n v-on:click.prevent="editCartera(cartera)">Editar</a>
                </td>
                <td width="10px"> 
                  <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="deleteCartera(cartera)">Eliminar</a>
                </td>
              </tr>

            </tbody>
          </table>

       @include('carteras.create')
       @include('carteras.edit')
            
          
        </div>
    

    </div>



</div>
     

@endsection
