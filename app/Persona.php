<?php

namespace credito;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
	protected $fillable =['nombre','direccion','role','cedula','celular','email','cobrador_id'];
    public function prestamos(){

    	return $this->hasMany('credito\Prestamo');
    }

    public function cobrador(){
        return $this->belongsTo('App\Persona','cobrador_id');
    }

    public function cliente(){

    	 return $this->hasMany('App\Persona');

    }


}
