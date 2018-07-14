<?php

namespace App\Http\Controllers;

use App\Image;
use App\Garage;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GarageImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
        $garage = Garage::find($id);

        foreach ($garage->images as $image) {
            # code...
            $image->delete();
        }

        $uploadedFiles = $request->photos;
        foreach ($uploadedFiles as $file) {
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->storeAs('photos', $filename, 'upload');
            $image = new Image();
            $image->name = $filename;
            $image->garage()->associate($garage);
            $image->save();
        }
        return response()->json('Created', Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
