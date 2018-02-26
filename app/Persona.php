<?php

namespace credito;

use Illuminate\Database\Eloquent\Model; 

class Persona extends Model
{
	protected $fillable =['nombre','direccion','role','cedula','celular','cobrador_id','estado'];
   
    public function prestamos(){

    	return $this->hasMany('credito\Prestamo');
    }

    public function cobrador(){
        return $this->belongsTo('credito\Persona','cobrador_id');
    }

    public function cliente(){

    	 return $this->hasMany('credito\Persona');

    }
//aqui esta la relacion pivot como la ve?
    //ok
    public function mycarteras(){

        return $this->belongsToMany(Cartera::class)->withTimestamps();
    }

    public function getCarterasAttribute(){

        return $this->mycarteras()->lists('cartera_id')->toArray();
    }


}
