@extends('layouts.master')

@section('content')
<div id="cobros"  class="box-header with-border">
   
    <h1 class="box-title"> Cobros</h3>
           
    <div class="box-body" style="margin-left: 10px;margin-right: 10px;">
        <div class="row">
            
                                 
          
       
          <table class="table table-hover table-striped">
            <thead>
              <tr>
                <th>Prestamo</th>
                <th>Cliente</th>
                <th>Saldo</th>
                <th>Cuota</th>
                <th>Accion</th>
         
              
                <th colspan="2">
                  &nbsp;
                </th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="prestamo in prestamos">
                <td width="10px">@{{prestamo.id}}</td>
                <td width="10px">@{{prestamo.cliente_id}}</td>
                <td width="10px">@{{prestamo.saldo}}</td>
           
                <td>
                   <div class="input-group">
                    <span class="input-group-addon">$</span>
                    <input class="form-control" type="text">
                    <span class="input-group-addon">.00</span>
                   </div>
                </td>
              
               
        
              
                <td width="10px">
                    <div class="radio">
                      <label>
                        <input name="optionsRadios" id="optionsRadios1" value="option1" checked="" type="radio">
                       Pago
                      </label>
                    </div>
                </td>
                <td width="10px"> 
                        
                     <div class="radio">
                      <label>
                        <input name="optionsRadios" id="optionsRadios2" value="option2" type="radio">
                        debe
                      </label>
                    </div>
            
                </td>
                <td>  <a href="#" class="btn btn-warning btn-sm"n v-on:click.prevent="editPrestamo(prestamo)">Editar</a></td>
              </tr>

            </tbody>
          </table>
        
   {{--    @include('prestamos.create')
      @include('prestamos.edit')  --}}
            
          
        </div>
    

    </div>



</div>
     

@endsection
