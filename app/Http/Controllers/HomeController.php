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
        $garages = Garage::orderBy('id', 'desc')->get();
        return view('home')->with('garages', $garages);
    }
}
