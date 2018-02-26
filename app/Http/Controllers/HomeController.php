<?php

namespace credito\Http\Controllers;

use Illuminate\Http\Request;
use credito\Cartera;
use credito\Persona;
use credito\Prestamo;
use credito\Cobro;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.0'iouu
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $carteras=Cartera::orderBy('nombre','ASC')->get();

       // $carteras_gastos=Cartera::join('gastos',function($join){
        //     $join->on('carteras.id','=','gastos.cartera_id')
        //     ->whereDate('gastos.created_at','=','2018-02-14');
        // })->get();

        // $carteras_prestamos=Cartera::join('prestamos',function($join){
        //     $join->on('carteras.id','=','prestamos.cartera_id')
        //     ->whereDate('prestamos.created_at','=','2018-02-14');
        // })->get();

            
      // $carteras = Cartera::select('gastos.created_at as fecha_gasto','prestamos.created_at as fecha_prestamo',
      //                   'cobros.created_at as fecha_cobro','prestamos.valor as valor_prestado','prestamos.pago_domingos as pago_domingos','prestamos.valor_seguro as valor_seguro',
      //                   'gastos.valor as valor_gasto','cobros.valor as valor_cobro','carteras.nombre as nombre_cartera')
      //                   ->join('gastos','carteras.id','gastos.cartera_id')
      //                   ->join('prestamos','carteras.id','prestamos.cartera_id')
      //                   ->join('cobros','prestamos.id','cobros.prestamo_id')
      //                   ->get();

           // dd($carteras);
        //dd($carteras_prestamos);
        return view('home',compact('carteras'));
    }

    public function carteras()
    {
        return view('carteras');
    }

    public function cobradores()
    {   
        $carteras=Cartera::orderBy('nombre','ASC')->pluck('nombre','id');
        $role="cobrador";
        return view('cobradores',compact('role','carteras'));
       
    }

    public function clientes()
    {   
        $carteras=Cartera::orderBy('nombre','ASC')->pluck('nombre','id');
        $cobradores=Persona::where('role','cobrador')->pluck('nombre','id');
        $role="cliente";
        return view('clientes',compact('role','carteras','cobradores'));
       
    }

    public function gastos(){
         $carteras=Cartera::orderBy('nombre','ASC')->pluck('nombre','id');
        return view('gastos',compact('carteras'));
    }

    public function prestamos(){

        $carteras=Cartera::orderBy('nombre','ASC')->pluck('nombre','id');
        $prestamos=Prestamo::orderBy('created_at','ASC')->paginate(15);
        $cobradores=Persona::where('role','cobrador')->pluck('nombre','id');
        $clientes=Persona::where('role','cliente')->pluck('nombre','id');


        return view('prestamos',compact('clientes','carteras','cobradores','prestamos'));
    }

    public function cobros(Request $request){

        //$prestamos=Prestamo::orderBy('orden','ASC')->get();

        $prestamos= Prestamo::filter($request->get('cartera'));

        $carteras=Cartera::orderBy('nombre','ASC')->pluck('nombre','id');

        return view('cobros',compact('prestamos','carteras'));
    }

    public function movimientos($id)
    {
       $prestamo=Prestamo::findOrFail($id);
       
       
       $cobros=Cobro::where('prestamo_id',$id)->get();
       
       //return response($cobros);

       return view('movimientos',compact('cobros','prestamo'));
       
    }

}
