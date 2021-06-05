<?php

namespace App\Http\Controllers;

use App\Demande;
use App\entrees;
use App\Fournisseur;
use App\Http\Controllers\Controller;
use App\Materiel;
use App\Personnel;
use Illuminate\Http\Request;

class DemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $demandes = Demande::latest()->paginate(5);
       $d= demande::get();
      $demandes = demande::join('personnels','demandes.personnelsId', '=', 'personnels.id')
          ->join('materiels', 'demandes.materielsId', '=', 'materiels.id')
          ->get(['demandes.*', 'materiels.nom as nomMateriel', 'personnels.nom as nomPersonnel']);

        $listepersonnels = Personnel::get();
       // dd($listePersonnels);
        $listeMateriels = Materiel::get();
        //dd($listeMateriels);

       // dd($demandes);
        return view('demandes.index',compact('demandes'))
            ->with('i', (request()->input('page', 1) - 1) * 5)
            ->with('listePersonnels', $listepersonnels)
            ->with('listeMateriels', $listeMateriels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('demandes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add(['variable' => 'value']); //add request

        $request->request->add(['validation' => 'non valide']);

        //dd ($request->request->get('validation'));

        $request->validate([
           'personnelsId' => 'required',
           'materielsId' => 'required',
        ]);
        Demande::create($request->all());

        return redirect()->route('demandes')
            ->with('success', 'Demande ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Demande  $demande
     * @return \Illuminate\Http\Response
     */

    public function show(Demande $demande)
    {
        $a = $demande->id;
        //dd($demande);
        $demand = demande::join('personnels','demandes.personnelsId', '=', 'personnels.id')
            ->join('materiels', 'demandes.materielsId', '=', 'materiels.id')
            ->where('demandes.id', "=", $demande->id)
            ->get(['demandes.*','personnels.nom']);
        $personne = Personnel::find($demande->personnelsId);
        $materiel = Materiel::find($demande->materielsId);
        //dd($materiel);

        return view('demandes.show' ,compact('demand'))
            ->with('personne', $personne)
            ->with('materiel', $materiel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function edit(Demande $demande)
    {
        return view('demandes.edit' ,compact('demande'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demande $demande)
    {
        $request->validate([
            'personnelsId' => 'required',
            'materielsId' => 'required',
            'validation' => 'required',
        ]);

        $demande->update($request->all());

        return redirect()->route('demandes')
            ->with('success', 'Demande modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Demande  $demande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demande $demande)
    {
        $demande->delete();

        return redirect()->route('demandes')
            ->with('success', 'Demande supprimé avec succès.');
    }
}
