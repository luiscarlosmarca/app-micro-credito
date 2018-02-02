@extends('layouts.master')

@section('content')
<div id="gasto"  class="box-header with-border">
   
    <h1 class="box-title"> Gastos</h3>
           
    <div class="box-body" style="margin-left: 10px;margin-right: 10px;">
        <div class="row">
            
          <a href="#" class="btn btn-success  pull-right" data-toggle="modal" data-target="#create">
              Nuevo gasto
          </a>
          <table class="table table-hover table-striped">
            <thead>
              <tr>
                <th>Id</th>
                <th>Detalles</th>
                <th>Valor</th>
                        
                <th colspan="2">
                  &nbsp;
                </th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="gasto in gastos">
                <td width="10px">@{{gasto.id}}</td>
                <td>@{{gasto.detalle}}</td>
                <td>@{{gasto.valor}}</td>
               
              
                <td width="10px">
                  <a href="#" class="btn btn-warning btn-sm"n v-on:click.prevent="editGasto(gasto)">Editar</a>
                </td>
                <td width="10px"> 
                  <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="deleteGasto(gasto)">Eliminar</a>
                </td>

              </tr>

            </tbody>
          </table>
       
       
       @include('gastos.create')
       @include('gastos.edit')
            
          
        </div>
    

    </div>



</div>
     

@endsection
