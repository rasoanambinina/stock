<?php

namespace App\Http\Controllers;

use App\entrees;
use App\Fournisseur;
use App\Http\Controllers\Controller;
use App\Materiel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BonEntrerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $bonEntrers = Entrees::latest()->paginate(5);
        $b= entrees::get();
       $bonEntrers = entrees::join('materiels', 'entrees.materielsId', '=', 'materiels.id')
                    ->join('fournisseurs', 'entrees.fournisseursId', '=', 'fournisseurs.id')
                    ->get(['entrees.*', 'materiels.nom as nomMateriel', 'fournisseurs.nom as nomFournisseur']);
       //dd($bonEntrers);

        $listeFournisseurs = Fournisseur::get();
        //dd($listeFournisseurs);
        $listeMateriels = Materiel::get();
        //dd($listeMateriels);

       return view('bonEntrers.index',compact('bonEntrers'))
            ->with('i', (request()->input('page', 1) - 1) * 5)
           ->with('listeMateriels', $listeMateriels)
           ->with('listeFournisseurs', $listeFournisseurs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bonEntrers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     //dd($request->get('fournisseurId'));
       // dd($request->get('quantiteEntrer'));
      //  dd($request->get('numeroBE'));
      //  dd($request->get('fournisseurId'));
         $request->validate([
             'numeroBE' => 'required',
             'materielsId' => 'required',
             'fournisseursId' => 'required',
             'quantiteEntrer' => 'required',
         ]);

         $materiel = Materiel::find($request->get('materielsId'));
         $ancienStock = $materiel->stock;
         $quantiteEntre = $request->get('quantiteEntrer');
         $nouveauStock = $ancienStock + $quantiteEntre;

         //dd($nouveauStock);
        $materiel->stock= $nouveauStock;
        $materiel->save();

         Entrees::create($request->all());

         return redirect()->route('bonEntrers')
             ->with('success', 'Bon Entrer ajoutée avec succès.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\entrees  $bonEntrer
     * @return \Illuminate\Http\Response
     */
    public function show(entrees $bonEntrer)
    {
        return view('bonEntrers.show',compact('bonEntrer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\entrees  $bonEntrer
     * @return \Illuminate\Http\Response
     */
    public function edit(entrees $bonEntrer)
    {
        $materiel = Materiel::findOrFail($bonEntrer->materielsId);
        $fournisseur = Fournisseur::findOrFail($bonEntrer->fournisseursId);

        $listeMateriels = Materiel::get();

        $listeFournisseur = Fournisseur::get();
        // dd($bonSortie);

        return view('bonEntrers.edit',compact('bonEntrer'))
            ->with('mat',$materiel)
            ->with('frs',$fournisseur)
            ->with('listeMateriels',$listeMateriels)
            ->with('listeFournisseur',$listeFournisseur);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\entrees  $bonEntrer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, entrees $bonEntrer)
    {
       // dd($bonEntrer);
        $request->validate([
            'numeroBE' => 'required',
            'materielsId' => 'required',
            'fournisseursId' => 'required',
            'quantiteEntrer' => 'required',
        ]);

        $bonEntrer->update($request->all());

        return redirect()->route('bonEntrers')
            ->with('succes', 'Bon Entrer modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entrees  $bonEntrer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entrees $bonEntrer)
    {
        //dd($bonEntrer);
        $bonEntrer->delete();

        return redirect()->route('bonEntrers')
            ->with('success','Bon Entrer suprimée avec succès. ');
    }
}
