<?php

namespace credito;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{

protected $fillable =['cartera_id','cliente_id','cobrador_id','articulo','estado','valor','plazo','pago_domingos','valor_seguro','valor_cuota','saldo','orden'];
   
    public function cliente(){
    	 return $this->belongsTo('credito\Persona','cliente_id');
    }

    public function cobrador(){
    	return $this->belongsTo('credito\Persona','cobrador_id');
    }

    public function cobros(){
    	return $this->hasMany('credito\Cobro');
    }

    // public function getSaldoAttribute(){

    // 	$valor_credito= $this->valor;
    // 	$pagos_credito[]=$this->cobros->valor;
    // 	$saldo=0;
    // 	foreach ($pagos_credito as $value) {
    // 		$saldo=$saldo+$value;
    // 	}

    // 	$saldo = $valor_credito-$pagos_credito;
    	
    // 	return $saldo;
    // }
}
