<?php

namespace App\Http\Controllers;

use App\Materiel;
use App\Personnel;
use App\Sortie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BonSortieController extends Controller
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

        $materiel = Materiel::find($request->get('materielsId'));
        $ancienStock = $materiel->stock;
        $quantiteEntre = $request->get('quantiteSortie');
        $nouveauStock = $ancienStock - $quantiteEntre;

        //dd($nouveauStock);
        $materiel->stock= $nouveauStock;
        $materiel->save();

        sortie::create($request->all());

        return redirect()->route('bonSorties')
            ->with('success', 'Bon Sortie ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bonSortie = Sortie::find($id);
        $materiel = Materiel::find($bonSortie->materielsId);
        $personnel = Personnel::find($bonSortie->personnelsId);
       // dd($personnel);

        return view('bonSorties.show',compact('bonSortie'))
                ->with('materiel',$materiel)
                ->with('personnel',$personnel);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bonSortie = Sortie::findOrFail($id);
        $materiel = Materiel::findOrFail($bonSortie->materielsId);
        $personnel = Personnel::findOrFail($bonSortie->personnelsId);

        $listeMateriels = Materiel::get();

        $listePersonnes = Personnel::get();
           // dd($bonSortie);
        //dd($sortie->id);

        return view('bonSorties.edit',compact('bonSortie'))
            ->with('mat',$materiel)
            ->with('pers',$personnel)
            ->with('listeMateriels',$listeMateriels)
            ->with('listePersonnes',$listePersonnes);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->request->get('numeroBS');

        //dd($sortie->numeroBS);
        //dd($request);
        $request->validate([
            'numeroBS' => 'required',
            'materielsId' => 'required',
            'personnelsId' => 'required',
            'quantiteSortie' => 'required',
        ]);

        $bonSortie=  Sortie::findOrFail($id);

        $bonSortie->update($request->all());
        //Sortie::whereId($id)->update();

       return redirect()->route('bonSorties')
           ->with('success', 'Bon Sortie modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sortie = Sortie::find($id);
        //dd($sortie);
        $sortie->delete();

        return redirect()->back()
            ->with('success', 'Bon Sortie supprimée avec succès.');
    }
}
