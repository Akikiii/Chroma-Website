<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import for database interactions

class PictureController extends Controller
{
    public function findNearestColor(Request $request)
    {
        // Validate and retrieve RGB values from request (adjust based on your data structure)
        $request->validate([
            'red' => 'required|integer|between:0,255',
            'green' => 'required|integer|between:0,255',
            'blue' => 'required|integer|between:0,255',
        ]);

        $red = $request->input('red');
        $green = $request->input('green');
        $blue = $request->input('blue');

        // Define a suitable distance function (consider Euclidean distance here)
        function distance($color1, $color2) {
            $redDiff = abs($color1['red'] - $color2['red']);
            $greenDiff = abs($color1['green'] - $color2['green']);
            $blueDiff = abs($color1['blue'] - $color2['blue']);
            return sqrt(pow($redDiff, 2) + pow($greenDiff, 2) + pow($blueDiff, 2));
        }

        // Fetch all colors from the database
        $colors = DB::table('colors')->get();

        // Initialize nearest color with a large distance
        $nearestColor = null;
        $minDistance = PHP_INT_MAX;

        // Iterate through colors and find the closest match
        foreach ($colors as $color) {
            $currentDistance = distance([
                'red' => $color->red,
                'green' => $color->green,
                'blue' => $color->blue,
            ], [
                'red' => $red,
                'green' => $green,
                'blue' => $blue,
            ]);

            if ($currentDistance < $minDistance) {
                $minDistance = $currentDistance;
                $nearestColor = $color;
            }
        }

        // Return the name of the nearest color
        if ($nearestColor) {
            return response()->json([
                'message' => 'Nearest color found!',
                'color_name' => $nearestColor->name,
            ]);
        } else {
            return response()->json([
                'message' => 'No color found in the database.',
            ], 404); // Consider a more appropriate status code if needed
        }
    }
}
