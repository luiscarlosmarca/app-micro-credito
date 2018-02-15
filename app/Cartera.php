<?php

namespace credito;

use Illuminate\Database\Eloquent\Model;

class Cartera extends Model
{
    protected $fillable =['nombre'];
    

    public function personas(){

        return $this->belongsToMany(Persona::class)->withTimestamps();
    }

    public function prestamos(){
    	return $this->hasMany('credito\Prestamo');
    }

    public function gastos(){
    	return $this->hasMany('credito\Gasto');
    }


//    select cb.created_at fecha_cobro, g.created_at fecha_gasto  from carteras c inner join prestamos p on c.id=p.cartera_id
// inner join cobros cb on  cb.prestamo_id=p.id
// inner join gastos g on g.cartera_id=c.id
// where cb.created_at  like '2018-02-11%' and g.created_at like '2018-02-11%';

  


    // public static function filter($fecha=null){
    
    // $cartera = Cartera::all()->get();
    // $cartera->map(function($_this) use($fecha){
    // 	dd($_this->prestamos());
    // });
 
    //     // ->orderBy('created_at','ASC')
    //     // ->paginate();
    // }


     public function scopeMis_gastos($query, $fecha) {
        
      if(trim($fecha)!=""){

        $query->where('cartera_id',$cartera); 
      }

    }


    public static function filter($cartera){
    
    return Prestamo::cartera($cartera)
 
        ->orderBy('orden','ASC')
        ->paginate();
    }


}
