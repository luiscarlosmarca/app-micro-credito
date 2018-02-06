<?php

namespace credito\Http\Controllers;

use credito\Prestamo;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $prestamo=Prestamo::get();

         
 
         return $prestamo;
    }

    /**
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            
            'valor'=>'integer',
            'articulo'=>'required'
                      
        ]);

        $prestamo=Prestamo::create($request->all()); 

        return;

    }

    /**
     * Display the specified resource.
     *
     * @param  \credito\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function show(Prestamo $prestamo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \credito\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function edit(Prestamo $prestamo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \credito\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'valor_cuota'=>['required','integer'],
            'articulo'=>'string',
            'valor'=>'integer',
                       
        ]);

        $prestamo=Prestamo::find($id)->update($request->all());
        
        return;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \credito\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prestamo=Prestamo::findOrFail($id);
        $prestamo->delete(); 
    }
}
