<?php

namespace App\Http\Controllers;

use App\Garage;
use Carbon\Carbon;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\SearchResource;
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

    public function search(Request $request)
    {
        # code...
        return view('search')->with('search', $request->search);
    }

    public function apiSearchGarage($search)
    {
        # code...
        $garages = Garage::with('images', 'tags')
            ->where('address', $search)
            ->orWhere('postal', $search)
            ->orderBy('id', 'desc')
            ->get();

        return response()->json(SearchResource::collection($garages), 200);
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

    public function mail(Request $request)
    {
        # code...

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email',
            'message' => 'required|max:2000'
        ]);

        $name = $request->name;
        $email = $request->email;
        $message = $request->message;

        Mail::to('headjd@gmail.com')->send(new SendMail($name, $email, $message));
        return redirect()->back()->with('flashMessage', 'Your message has been send successfully');

    }

}
