<?php

namespace credito\Http\Controllers;

use Illuminate\Http\Request;

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
        $role="cobrador";
        return view('cobradores',compact('role'));

        
    }
}
