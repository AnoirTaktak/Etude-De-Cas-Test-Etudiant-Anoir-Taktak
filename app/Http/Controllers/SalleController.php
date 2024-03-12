<?php

namespace App\Http\Controllers;

use App\Models\Salle;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    public function index()
    {
    $salles = Salle::all()->toArray();
    return array_reverse($salles);
    }

    public function store(Request $request)
    {
        $salle = new Salle([
        'libelle' => $request->input('libelle'),
        'adresse' => $request->input('adresse')
    ]);
        $salle->save();
        return response()->json('Salle créé !');
    }

    public function show($id)
    {
        $salle= Salle::find($id);
        return response()->json($salle);
    }

    public function update($id, Request $request)
    {
        $salle = Salle::find($id);
        $salle->update($request->all());
        return response()->json($salle);
    }

    public function destroy($id)
    {
        $salle = Salle::find($id);
        $salle->delete();
        return response()->json(['message' => 'Salle deleted successfully']);
    }




}
