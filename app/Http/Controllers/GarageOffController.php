<?php

namespace App\Http\Controllers;

use App\User;
use App\Image;
use App\Garage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class GarageOffController extends Controller
{
    //
    public function store(Request $request)
    {
        # code...
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->type = 'client';
        $user->save();

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
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
            $garage->user_id = $user->id;

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

    }
}
