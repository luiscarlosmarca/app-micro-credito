<?php

namespace credito;

use Illuminate\Database\Eloquent\Model;

class Cartera extends Model
{
    protected $fillable =['nombre'];
    

    public function personas(){

        return $this->belongsToMany(Persona::class)->withTimestamps();
    }
    
}
