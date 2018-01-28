<?php

namespace credito\Http\Controllers;

use credito\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         $personas=Persona::get();
 
         return $personas;
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
            'nombre'=>['required','string'],
            'cedula'=>['required','integer'],
            'celular'=>'required',
            'email'=>'unique:personas,email'
           
        ]);

        Persona::create($request->all()); 

        return;

    }

    /**
     * Display the specified resource.
     *
     * @param  \credito\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show($role)
    {   

        $persona = Persona::where('role',$role)->orderBy('id','DESC')->get();
      
        return $persona;
    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \credito\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[

            'nombre'=>'required,string',
            'cedula'=>'required,integer',
            'celular'=>'required',
           
            
        ]);
        Persona::find($id)->update($request->all());
        return;

  
    }      
    /**
     * Remove the specified resource from storage.
     *
     * @param  \credito\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
             
        $personas=Persona::findOrFail($id);
        $personas->delete(); 

    }
}
