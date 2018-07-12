<?php

namespace App\Http\Controllers;

use App\Garage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Resources\AddressResource;

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

    public function search()
    {
        # code...
        return view('search');
    }

    public function address($address)
    {
        # code...
        return view('address')->with('address', $address);
    }

    public function searchAddress($address)
    {
        # code...
        $garages = Garage::with('images', 'tags')->where('address', $address)->get();

        if ($garages->count() > 0) {
            # code...
            return response()->json(AddressResource::collection($garages), 200);
        } else {
            # code...
            $data = [];
            return response()->json(false, 200);
        }
    }

}
