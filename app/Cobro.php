<?php

namespace credito;

use Illuminate\Database\Eloquent\Model;



class Cobro extends Model
{

protected $fillable =['prestamo_id','valor','observaciones'];
    

    public function prestamo(){

    	return $this->belongsTo('Credito\Prestamo','prestamo_id');

    }

    
}
