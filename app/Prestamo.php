<?php

namespace credito;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{

	protected $fillable =['cartera_id','cliente_id','cobrador_id','articulo','estado','valor','plazo','pago_domingos','valor_seguro','valor_cuota'];
    public function cliente(){
    	 return $this->belongsTo('credito\Persona');
    }

    public function cobrador(){
    	return $this->belongsTo('credito\Persona');
    }

    public function cobros(){
    	return $this->hasMany('credito\Cobro');
    }
}
