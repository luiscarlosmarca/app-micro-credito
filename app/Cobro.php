<?php

namespace credito;

use Illuminate\Database\Eloquent\Model;

class Cobro extends Model
{
    public function prestamo(){

    	return $this->belongsTo('Credito\Prestamo');

    }
}
