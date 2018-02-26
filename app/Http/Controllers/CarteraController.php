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
      //   $fecha='2018-02-10';
      // $cartera = Cartera::select('gastos.valor','cobros.valor','prestamos.valor','prestamos.valor_seguro','prestamos.pago_domingos')
      //                   ->join('gastos','carteras.id','gastos.cartera_id')
      //                   ->join('prestamos','carteras.id','prestamos.cartera_id')
      //                   ->join('cobros','prestamos.id','cobros.prestamo_id')
      //                   ->whereDate('cobros.created_at','>=',$fecha)
      //                   ->whereDate('gastos.created_at','<=',$fecha)
      //                   ->get();

      //       $cobros = \DB:: table('cobros cob')
      //                   ->select('valor','')
      //                   ->join('prestamos pres','cob.prestamo_id','pres.id')
      //                   ->join('cartera car','cob.cartera_id','car.id')
      //                   ->get();
      //           dd($cobros);




    // $cartera->map(function($_this) use($fecha){
    //     $cobros =$_this->prestamos;
    //     $gastos = $_this->gastos->where('detalle','sicario');
    //     dd($gastos);
    // });
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
