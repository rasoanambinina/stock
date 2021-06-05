<?php

namespace App\Http\Controllers;

use App\Materiel;
use App\Product;
use Illuminate\Http\Request;

class MaterielController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materiels = Materiel::latest()->paginate(5);

        return view('materiels.index',compact('materiels'))
            ->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('materiels.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'referenceMateriel' => 'required',
            'nom' => 'required',
            'prixUnitaire' => 'required',
            'stock' => 'required',
        ]);

        Materiel::create($request->all());

        return redirect()->route('materiels')
            ->with('success', 'materiel crée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Materiel  $materiel
     * @return \Illuminate\Http\Response
     */
    public function show(Materiel $materiel)
    {
        return view('materiels.show' ,compact('materiel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Materiel  $materiel
     * @return \Illuminate\Http\Response
     */
    public function edit(Materiel $materiel)
    {
        return view('materiels.edit',compact('materiel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Materiel  $materiel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materiel $materiel)
    {
        $request->validate([
            'referenceMateriel' => 'required',
            'nom' => 'required',
        ]);

        $materiel->update($request->all());

        return redirect()->route('materiels')
            ->with('success', 'Materiel modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Materiel  $materiel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materiel $materiel)
    {
        $materiel->delete();

        return redirect()->route('materiels')
            ->with('success', 'Materiel supprimé avec succès.');
    }
}
