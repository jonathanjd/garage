<?php

namespace App\Http\Controllers;

use App\Garage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Page Home.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $garages = Garage::orderBy('id', 'desc')->take(4)->get();
        return view('home')->with('garages', $garages);
    }

    public function show($id)
    {
        # code...
        return view('show')->with('id', $id);
    }

}
