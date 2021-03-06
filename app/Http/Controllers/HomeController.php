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
    public function index($fecha){

       $y=date("Y");
       $m=date("m");
       $d=date("d");
       $hoy="'".$y."-".$m."-".$d."'";

        //salida
        $carteras_gastos=Cartera::join('gastos',function($join) use($fecha){
            $join->on('carteras.id','=','gastos.cartera_id')
            ->whereDate('gastos.created_at','=',$fecha);
        })->get(['gastos.valor','carteras.nombre','gastos.id','gastos.cartera_id']);

        // entrada - salida
        $carteras_prestamos=Cartera::join('prestamos',function($join)use($fecha){
            $join->on('carteras.id','=','prestamos.cartera_id')
            ->whereDate('prestamos.created_at','=',$fecha);
        })->get(['prestamos.valor','prestamos.valor_seguro','prestamos.pago_domingos','carteras.nombre','prestamos.id','prestamos.cartera_id']);

        //entrada
        $fecha='%'.$fecha.'%';
        $carteras_cobros=Cartera::join('prestamos',function($join){
            $join->on('carteras.id','=','prestamos.cartera_id');
        })->join('cobros',function($join2)use($fecha){
            $join2->on('prestamos.id','=','cobros.prestamo_id'  );
        })
        ->where('cobros.created_at','like',$fecha)
        ->get(['cobros.valor','carteras.nombre','cobros.prestamo_id']);


        $carteras_prestamos = $carteras_prestamos->groupBy('nombre');
        
        $carteras_gastos = $carteras_gastos->groupBy('nombre');

        $carteras_cobros = $carteras_cobros->groupBy('nombre');

       
        $gastos = $carteras_gastos->map(function($_this){
          return $_this->sum('valor');  
        });

        $prestamos = $carteras_prestamos->map(function($_this){
          return $_this->sum('valor');  
        });
        //dd($carteras_cobros);
//                        dump($carteras_cobros->collapse()->pluck('nombre'));

        $ingresos = $carteras_prestamos->count() ?
                     $carteras_prestamos->map(function($_this) use($carteras_cobros){
                        return $_this->sum('pago_domingos') + $carteras_cobros->collapse()->where('nombre',$_this->first()->nombre)->sum('valor');  
                    }) :
                    $carteras_cobros->map(function($_this) {
                      //  dump($_this->sum('valor'));
                     return $_this->where('nombre',$_this->first()->nombre)->sum('valor');  
                    });
                   

   

        $seguros = $carteras_prestamos->map(function($_this){
          return $_this->sum('valor_seguro');  
        });

 
        $entradas = $carteras_prestamos->map(function($_this) use($carteras_cobros){
          return $_this->sum('valor_seguro') + $_this->sum('pago_domingos') + $carteras_cobros->sum('valor');  
        });

        $salidas = $carteras_prestamos->map(function($_this) use($carteras_gastos){
          return $_this->sum('valor') + $carteras_gastos->sum('valor');  
        });

        $efectivo_diario=$carteras_prestamos->map(function($_this) use($carteras_cobros,$carteras_gastos){
                       return ($_this->sum('valor_seguro') + $_this->sum('pago_domingos') + $carteras_cobros->collapse()->sum('valor'))-
            ($_this->sum('valor')+$carteras_gastos->sum('valor'));


        });


      

      $carteras = collect([
        'gastos'=>$gastos,
        'prestamos'=>$prestamos,
        'ingresos'=>$ingresos,
        'seguros'=>$seguros,
        'efectivo_diario'=>$efectivo_diario
       ]);
     
       return view('home',compact('carteras','fecha'));
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
        $prestamos=Prestamo::orderBy('created_at','ASC')->get();
        $cobradores=Persona::where('role','cobrador')->orderBy('nombre','ASC')->pluck('nombre','id');
        $clientes=Persona::where('role','cliente')->orderBy('nombre','ASC')->pluck('nombre','id');


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
