<?php

namespace credito\Http\Controllers;

use credito\Cartera;
use Illuminate\Http\Request;

class CarteraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartera=Cartera::orderBy('id','DESC')->get();
     
        return $cartera;
    }

     /**
     * Display the specified resource.
     *
     * @param  \credito\Cobro  $cobro
     * @return \Illuminate\Http\Response
     */

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
       
        $this->validate($request,[
            'nombre'=>'required'
        ]);

        Cartera::create($request->all()); 

        return;

    }
 
   

   

    /**
     * Update the specified resource in storage.
     *     * @param  \Illuminate\Http\Request  $request
     * @param  \credito\Cartera  $cartera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'nombre' => 'required '

        ]);

        Cartera::find($id)->update($request->all());
        return;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \credito\Cartera  $cartera
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carteras=Cartera::findOrFail($id);
        $carteras->delete();   
    }
}
