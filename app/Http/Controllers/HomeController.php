<?php

  namespace App\Http\Controllers;
  use App\Models\truck;


class HomeController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      /**  Ausins */
      //   newest     $trucks = Truck::all();
      //   newest    return view('home', ['trucks' => $trucks]);
      //$trucks = Truck::all();
      //return view('trucks.index',['trucks' => $trucks]);




      $trucks = Truck::all();
      return view('home', ['trucks' => $trucks]);

      //  original   ---->   return view('home');
      //return view('home')->with('truck', $truck);
    }
}
