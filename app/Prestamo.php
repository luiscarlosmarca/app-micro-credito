<?php

namespace credito;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{

protected $fillable =['cartera_id','cliente_id','cobrador_id','articulo','estado','valor','plazo','pago_domingos','valor_seguro','valor_cuota','orden','valor_pagar'];
   
    public function cliente(){
    	 return $this->belongsTo('credito\Persona','cliente_id');
    }

    public function cobrador(){
    	return $this->belongsTo('credito\Persona','cobrador_id');
    }

    public function mi_cartera(){
        return $this->belongsTo('credito\Cartera','cartera_id');
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



    public function scopeCartera($query, $cartera) {
        
      if(trim($cartera)!=""){

        $query->where('cartera_id',$cartera); 
      }

    }


    public static function filter($cartera){
    
    return Prestamo::cartera($cartera)
 
        ->orderBy('orden','ASC')
        ->get();
      
    }

}
