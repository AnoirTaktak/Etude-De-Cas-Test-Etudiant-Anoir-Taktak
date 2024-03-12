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
        $pieces = Piece::all()->toArray();
        return array_reverse($pieces);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $piece = new Piece([
            'nomauteur' => $request->input('titre'),
            'email' => $request->input('flyer')
        ]);
            $piece->save();
            return response()->json('Piece créé !');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $piece= Piece::find($id);
        return response()->json($piece);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $piece = Piece::find($id);
        $piece->update($request->all());
        return response()->json($piece);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $piece = Piece::find($id);
        $piece->delete();
        return response()->json(['message' => 'Piece  deleted successfully']);
    }
}
