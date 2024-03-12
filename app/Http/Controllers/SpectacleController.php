<?php

namespace App\Http\Controllers;

use App\Models\Piece;
use App\Models\Spectacle;
use Illuminate\Http\Request;

class SpectacleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spectacles = Spectacle::all()->toArray();
        return array_reverse($spectacles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $spectacles = new Spectacle([
            'datespectacle' => $request->input('datespectacle'),
        ]
        );
        $spectacles->save();
            return response()->json('Piece créé !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $spectacles= Spectacle::find($id);
        return response()->json($spectacles);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $spectacles = Spectacle::find($id);
        $spectacles->update($request->all());
        return response()->json($spectacles);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $spectacles = Spectacle::find($id);
        $spectacles->delete();
        return response()->json(['message' => 'Spectacle deleted successfully']);
    }
}
