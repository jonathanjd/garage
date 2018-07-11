<?php

namespace App\Http\Controllers;

use App\Garage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\SearchResource;
use App\User;


class SearchController extends Controller
{
    //

    public function searchCode($code)
    {
        # code...
        $searchCode = Garage::with('state')->where('postal', $code)->get();
        return response()->json(SearchResource::collection($searchCode), 200);
    }

    public function searchUserLogging()
    {
        # code...
        if (Auth::check()) {
            # code...
            return response()->json(true, 200);
        } else {
            # code...
            return response()->json(false, 200);
        }
    }

    public function verificarEmail($email)
    {
        # code...
        $user = User::where('email', $email)->first();
        if ($user) {
            # code...
            return response()->json(true, 200);
        } else {
            # code...
            return response()->json(false, 200);
        }

    }
}