<?php

namespace credito\Http\Controllers;

use Illuminate\Http\Request;
use credito\Cartera;
use credito\Persona;
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
        return view('home');
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
        return view('gastos');
    }
}
