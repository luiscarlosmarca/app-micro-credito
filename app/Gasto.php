<?php

namespace credito;

use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
     protected $fillable =['detalle','valor','cartera_id'];

    public function cartera(){
        return $this->belongsTo('credito\Cartera','cartera_id');
    }
}
