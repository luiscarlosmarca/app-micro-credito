<?php

namespace credito\Http\Controllers;

use credito\Cobro;
use credito\Prestamo;
use Illuminate\Http\Request;

class CobroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $prestamo=Prestamo::findOrFail($id);

        return $prestamo;
       
       // return view('admin.cursos.edit',compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $prestamos=Prestamo::orderby('ASC','ID')->get();
        return view('cobros',compact('prestamos'));
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
            
            'valor'=>['integer','required']
            
                      
        ]);

        $cobro=Cobro::create($request->all()); 

        $prestamo=Prestamo::find($request->prestamo_id);


        return $prestamo;
    }

    /**
     * Display the specified resource.
     *
     * @param  \credito\Cobro  $cobro
     * @return \Illuminate\Http\Response
     */
    public function movimientos($id)
    {
       //$prestamo=Prestamo::findOrFail($id);

       $cobros=Cobro::where('prestamo_id',$id)->get();
       
       //return response($cobros);

       return view('movimientos');
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \credito\Cobro  $cobro
     * @return \Illuminate\Http\Response
     */
    public function edit(Cobro $cobro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \credito\Cobro  $cobro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cobro $cobro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \credito\Cobro  $cobro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   

        $cobro=Cobro::findOrFail($id);
        $cobro->delete(); 
        return $cobro;
    }
}
