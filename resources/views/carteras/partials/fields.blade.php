

<div class="form-group">
      <label class="col-sm-3 control-label">Nombre</label>
      <div class="col-sm-6">
        <div class="input-group">
          {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Digite el nombre de la linea de credito'])!!}

        </div>
  </div>
</div>


<div class="form-group">
      <label class="col-sm-3 control-label">Interes</label>
      <div class="col-sm-6">
        <div class="input-group">
          {!! Form::text('interest',null,['class'=>'form-control','placeholder'=>'Digite el interes'])!!}

        </div>
  </div>
</div>


<div class="form-group">
      <label class="col-sm-3 control-label">Plazo</label>
      <div class="col-sm-6">
        <div class="input-group">
          {!! Form::text('time',null,['class'=>'form-control','placeholder'=>'Digite el plazo'])!!}

        </div>
  </div>
</div>

<div class="form-group">
      <label class="col-sm-3 control-label">Montos</label>
      <div class="col-sm-6">
        <div class="input-group">
          {!! Form::text('quantity',null,['class'=>'form-control','placeholder'=>'Digite el monto '])!!}

        </div>
  </div>
</div>

<div class="form-group">
  <div class="col-sm-6">
  {!! Form::submit('Actualizar Linea de Credito',['class'=>'btn btn-border btn-alt border-green btn-link font-green'])!!}

  </div>
</div>
