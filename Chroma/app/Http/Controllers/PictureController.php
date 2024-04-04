<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PictureController extends Controller
{
    public function uploadImage(Request $request)
    {
        $image = $request->file('image');
    
        // Process the uploaded image here
    
        return response()->json(['image' => $image]);
    }
}
