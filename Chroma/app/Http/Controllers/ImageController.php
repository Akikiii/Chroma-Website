<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time() . '-' . $request->image->getClientOriginalName();
        $request->image->storeAs('public/images', $imageName);

        return response()->json(['image' => $imageName]);
    }
}