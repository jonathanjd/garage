<?php

namespace App\Http\Controllers;

use App\Tag;
use App\User;
use App\Image;
use App\Garage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class GarageController extends Controller
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
     * Display a listing of the resource by user.
     *
     * @return \Illuminate\Http\Response
     */
    public function byUser()
    {
        # code...
        $garages = Garage::with('state')->where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        return response()->json($garages, 200);
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
    public function store(Request $request)
    {
        //
        # code...
        $myArrayTags = explode(',', $request->tags);

        $garage = new Garage();

        $garage->address = $request->address;
        $garage->city = $request->city;
        $garage->postal = $request->postal;
        $garage->lat = $request->lat;
        $garage->lng = $request->lng;

        $garage->title = $request->title;
        $garage->description = $request->description;

        $garage->startdate = $request->startdate;
        $garage->enddate = $request->enddate;
        $garage->starthour = $request->starthour;
        $garage->endhour = $request->endhour;

        $garage->state_id = $request->state;
        $garage->type_garage_id = $request->type_garage_id;
        $garage->user_id = auth()->user()->id;

        $garage->save();

        $uploadedFiles = $request->photos;
        foreach ($uploadedFiles as $file) {
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->storeAs('photos', $filename, 'upload');
            $image = new Image();
            $image->name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $image->garage()->associate($garage);
            $image->save();
        }

        $myArrayTags = explode(',', $request->tags);

        foreach ($myArrayTags as $myTag) {
            # code...
            $tag = new Tag();
            $tag->name = $myTag;
            $tag->save();

            $garage->tags()->sync($tag, false);
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
        $garage = Garage::find($id);
        $garage->delete();
        return response('Deleted', Response::HTTP_NO_CONTENT);
    }

}
