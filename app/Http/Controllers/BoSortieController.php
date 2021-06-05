<?php

namespace App\Http\Controllers;

use App\Materiel;
use App\Personnel;
use App\Sortie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BoSortieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listeMateriels = Materiel::get();
        //dd($listeMateriels);

        $listePersonnes = Personnel::get();

        //$bonSorties = sortie::latest()->paginate(5);
        $bonSorties = sortie::join('materiels', 'sorties.materielsId', '=', 'materiels.id')
            ->join('personnels', 'sorties.personnelsId', '=', 'personnels.id')
            ->get(['sorties.*', 'materiels.nom as nomMateriel', 'personnels.nom as nomPersonne']);

        return view('bonSorties.index',compact('bonSorties'))
            ->with('i', (request()->input('page', 1) - 1) * 5)
            ->with('listeMateriels', $listeMateriels)
            ->with('listePersonnes', $listePersonnes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bonSorties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'numeroBS' => 'required',
            'materielsId' => 'required',
            'personnelsId' => 'required',
            'quantiteSortie' => 'required',
        ]);

        sortie::create($request->all());

        return redirect()->route('bonSorties')
            ->with('success', 'Bon Sortie ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sortie  $sortie
     * @return \Illuminate\Http\Response
     */
    public function show(Sortie $sortie)
    {
        dd($sortie);
        $materiel = Materiel::find($sortie->materielsId);
        $personnel = Personnel::find($sortie->personnelsId);
        // dd($personnel);
        return view('bonSorties.show',compact('$sortie'))
            ->with('materiel',$materiel)
            ->with('personnel',$personnel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sortie  $sortie
     * @return \Illuminate\Http\Response
     */
    public function edit(Sortie $sortie)
    {
        $materiel = Materiel::find($sortie->materielsId);
        $personnel = Personnel::find($sortie->personnelsId);

        $listeMateriels = Materiel::get();

        $listePersonnes = Personnel::get();

        return view('bonSorties.edit',compact('sortie'))
            ->with('mat',$materiel)
            ->with('pers',$personnel)
            ->with('listeMateriels',$listeMateriels)
            ->with('listePersonnes',$listePersonnes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sortie  $sortie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sortie $sortie)
    {
        $request->validate([
            'numeroBS' => 'required',
            'materielsId' => 'required',
            'personnelsId' => 'required',
            'quantiteSortie' => 'required',
        ]);

        $sortie->update($request->all());

        return redirect()->route('sortie')
            ->with('success', 'Bon Sortie modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sortie  $sortie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sortie $sortie)
    {
        dd($sortie);
        $sortie->delete();

        return redirect()->back()
            ->with('success', 'Bon Sortie supprimée avec succès.');
    }
}
