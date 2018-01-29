<?php

namespace credito\Http\Controllers;

use credito\Gasto;
use Illuminate\Http\Request;

class GastoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gasto=Gasto::orderBy('id','DESC')->get();
     
        return $gasto;
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate($request,[
            'detalle'=>['required','string'],
            'valor'=>['required','integer'],
           
           
        ]);

        $gasto=Gasto::create($request->all()); 


        return;

    }

 

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \credito\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'valor'   =>['required','integer'],
            'detalle' =>['required','string']
                                 
        ]);

        $gasto=Gasto::find($id);
        $gasto->update($request->all());
     
      
        return;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \credito\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gastos=Gasto::findOrFail($id);
        $gastos->delete(); 
    }
}
