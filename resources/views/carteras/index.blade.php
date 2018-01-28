@extends('layouts.master')

@section('content')
<div class="box-header with-border">
          <h3 class="box-title"> Inicio</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
        
          </div>
    
    <div class="box-body" id="cartera">
     
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                    <div id="cartera" class="row" style="margin-left: 0px;margin-right: 0px;">
                    <div class="col-xs-12">
                      <h1 class="page-header">Carteras</h1>
                    </div>
                    <div class="col-sm-11">
                      <a href="#" class="btn btn-primary pull-right" data-toggle="modal" data-target="#create">
                      Nueva Cartera
                      </a>
                      <table class="table table-hover table-striped">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Tarea</th>
                            <th colspan="2">
                              &nbsp;
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td width="10px">1</td>
                            <td>tarea</td>
                            <td width="10px">
                              <a href="#" class="btn btn-warning btn-sm">Editar</a>
                            </td>
                            <td width="10px">
                              <a href="#" class="btn btn-danger btn-sm">Eliminar</a>
                            </td>
                          </tr>

                        </tbody>
                      </table>
                
                    <pre> data
                          @{{cartera}}
                    </pre>
                
              
    
  
    
                    </div>
                </div>
            </div>
        </div>
     </div>   
 </div>

@endsection
