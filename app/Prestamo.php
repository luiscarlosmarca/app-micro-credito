<?php

namespace credito;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
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
